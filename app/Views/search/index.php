<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Pencarian</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Pencarian Portal Desa</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Temukan berita, dokumen publik, produk UMKM, destinasi wisata, agenda kegiatan, dan data pembangunan secara terpadu.
        </p>

        <!-- Form Search Global -->
        <form method="get" action="<?= base_url('search') ?>" style="margin-top: 1.5rem; display: flex; gap: 0.5rem; max-width: 650px;">
            <input type="text" name="q" value="<?= esc($query) ?>" placeholder="Ketik kata kunci yang ingin dicari..." required
                   style="flex: 1; padding: 0.75rem 1.25rem; border-radius: 9999px; border: none; font-size: 0.95rem; outline: none; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 9999px; background: #10b981; color: #fff; font-weight: 700; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.4rem;">
                <i data-lucide="search" style="width: 18px; height: 18px;"></i> Cari
            </button>
        </form>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <?php if (empty($query)): ?>
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
            <i data-lucide="search" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Masukkan Kata Kunci</h3>
            <p>Silakan ketik apa saja yang ingin Anda cari pada kotak di atas.</p>
        </div>
    <?php else: ?>
        <div style="margin-bottom: 1.5rem;">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">
                Hasil Pencarian untuk: "<?= esc($query) ?>"
            </h2>
            <p style="font-size: 0.85rem; color: #64748b;">Ditemukan <?= $totalFound ?> data yang relevan</p>
        </div>

        <?php if ($totalFound === 0): ?>
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
                <i data-lucide="help-circle" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Tidak Ditemukan Hasil</h3>
                <p>Coba gunakan kata kunci lain yang lebih umum atau periksa ejaan kata.</p>
            </div>
        <?php else: ?>
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <!-- Berita -->
                <?php if (!empty($results['berita'])): ?>
                    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0b6045; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i data-lucide="newspaper" style="width: 18px; height: 18px;"></i> Berita & Artikel Desa (<?= count($results['berita']) ?>)
                        </h3>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <?php foreach ($results['berita'] as $b): ?>
                                <div style="padding: 0.75rem; border-radius: 8px; background: #f8fafc; border: 1px solid #f1f5f9;">
                                    <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.25rem;">
                                        <a href="<?= base_url('berita/' . $b['slug']) ?>" style="color: #0f172a; text-decoration: none;"><?= esc($b['title']) ?></a>
                                    </h4>
                                    <p style="font-size: 0.82rem; color: #64748b;"><?= character_limiter(strip_tags($b['content']), 140) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Dokumen -->
                <?php if (!empty($results['dokumen'])): ?>
                    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0b6045; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i data-lucide="file-text" style="width: 18px; height: 18px;"></i> Dokumen & Peraturan Desa (<?= count($results['dokumen']) ?>)
                        </h3>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            <?php foreach ($results['dokumen'] as $d): ?>
                                <div style="padding: 0.75rem; border-radius: 8px; background: #f8fafc; border: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center;">
                                    <div>
                                        <h4 style="font-size: 0.95rem; font-weight: 700; color: #0f172a;"><?= esc($d['judul']) ?></h4>
                                        <span style="font-size: 0.78rem; color: #64748b;">No: <?= esc($d['nomor_dokumen']) ?> &bull; Tahun <?= esc($d['tahun']) ?></span>
                                    </div>
                                    <a href="<?= base_url('dokumen/download/' . $d['id']) ?>" style="padding: 0.4rem 0.8rem; background: #0b6045; color: #fff; font-size: 0.78rem; font-weight: 600; border-radius: 6px; text-decoration: none;">
                                        Unduh
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- UMKM -->
                <?php if (!empty($results['umkm'])): ?>
                    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0b6045; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i data-lucide="shopping-bag" style="width: 18px; height: 18px;"></i> Produk UMKM & BUMDes (<?= count($results['umkm']) ?>)
                        </h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem;">
                            <?php foreach ($results['umkm'] as $u): ?>
                                <div style="padding: 1rem; border-radius: 10px; background: #f8fafc; border: 1px solid #f1f5f9;">
                                    <span style="font-size: 0.72rem; font-weight: 700; color: #059669; text-transform: uppercase;"><?= esc($u['kategori']) ?></span>
                                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin: 0.2rem 0;"><?= esc($u['nama_usaha']) ?></h4>
                                    <div style="font-size: 0.85rem; font-weight: 800; color: #059669; margin-bottom: 0.5rem;"><?= esc($u['harga']) ?></div>
                                    <a href="<?= base_url('potensi') ?>" style="font-size: 0.78rem; color: #0b6045; font-weight: 600; text-decoration: none;">Lihat di Katalog &rarr;</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Wisata -->
                <?php if (!empty($results['wisata'])): ?>
                    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0b6045; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i data-lucide="palmtree" style="width: 18px; height: 18px;"></i> Destinasi Wisata Desa (<?= count($results['wisata']) ?>)
                        </h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem;">
                            <?php foreach ($results['wisata'] as $w): ?>
                                <div style="padding: 1rem; border-radius: 10px; background: #f8fafc; border: 1px solid #f1f5f9;">
                                    <span style="font-size: 0.72rem; font-weight: 700; color: #059669; text-transform: uppercase;"><?= esc($w['kategori']) ?></span>
                                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin: 0.2rem 0;"><?= esc($w['nama']) ?></h4>
                                    <p style="font-size: 0.8rem; color: #64748b;"><?= character_limiter(strip_tags($w['deskripsi']), 90) ?></p>
                                    <a href="<?= base_url('potensi') ?>" style="font-size: 0.78rem; color: #0b6045; font-weight: 600; text-decoration: none; margin-top: 0.5rem; display: inline-block;">Lihat Wisata &rarr;</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
