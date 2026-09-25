<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Potensi & UMKM</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Potensi UMKM & Destinasi Wisata</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Katalog produk unggulan hasil olahan warga desa, sentra industri BUMDes Bina Marannu, dan pesona wisata bahari pesisir <?= esc($desa['nama_desa']) ?>.
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2.5rem; padding-bottom: 4rem;">
    <!-- 1. Bagian Katalog UMKM & Produk Desa -->
    <div style="margin-bottom: 3.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span style="font-size: 0.8rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;">Lapak Warga & BUMDes</span>
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 0.2rem;">Katalog Produk UMKM Desa</h2>
            </div>

            <!-- Filter Kategori UMKM -->
            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                <a href="<?= base_url('potensi?kat_umkm=semua') ?>" 
                   style="padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.82rem; font-weight: 600; text-decoration: none; <?= $currentKatUmkm === 'semua' ? 'background: #0b6045; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
                    Semua
                </a>
                <?php foreach ($kategoriUmkmList as $ku): ?>
                    <a href="<?= base_url('potensi?kat_umkm=' . urlencode($ku['kategori'])) ?>" 
                       style="padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.82rem; font-weight: 600; text-decoration: none; <?= $currentKatUmkm === $ku['kategori'] ? 'background: #0b6045; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
                        <?= esc($ku['kategori']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Grid Produk UMKM -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
            <?php foreach ($umkmList as $u): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
                    <a href="<?= base_url('umkm/' . $u['id']) ?>" style="display: block; height: 180px; background: #f1f5f9; position: relative;">
                        <?php $fotoU = !empty($u['foto']) ? $u['foto'] : 'images/berita-tani.webp'; ?>
                        <img src="<?= base_url($fotoU) ?>" alt="<?= esc($u['nama_usaha']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php if ($u['is_unggulan']): ?>
                            <span style="position: absolute; top: 10px; left: 10px; padding: 0.25rem 0.6rem; border-radius: 6px; background: #f59e0b; color: #fff; font-size: 0.72rem; font-weight: 700;">
                                Produk Unggulan
                            </span>
                        <?php endif; ?>
                        <?php if ($u['is_bumdes']): ?>
                            <span style="position: absolute; top: 10px; right: 10px; padding: 0.25rem 0.6rem; border-radius: 6px; background: #0b6045; color: #fff; font-size: 0.72rem; font-weight: 700;">
                                BUMDes
                            </span>
                        <?php endif; ?>
                    </a>
                    <div style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;"><?= esc($u['kategori']) ?></span>
                        <h3 style="font-size: 1.05rem; font-weight: 700; color: #0f172a; margin: 0.25rem 0 0.5rem;">
                            <a href="<?= base_url('umkm/' . $u['id']) ?>" style="color: inherit; text-decoration: none;">
                                <?= esc($u['nama_usaha']) ?>
                            </a>
                        </h3>
                        <div style="font-size: 1.15rem; font-weight: 800; color: #0b6045; margin-bottom: 0.5rem;"><?= esc($u['harga']) ?></div>
                        <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin-bottom: 1rem; flex-grow: 1;">
                            <?= character_limiter(strip_tags($u['deskripsi']), 85) ?>
                        </p>
                        
                        <div style="font-size: 0.8rem; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 0.6rem; margin-bottom: 1rem;">
                            <div>Pemilik: <strong style="color: #475569;"><?= esc($u['nama_pemilik']) ?></strong></div>
                            <div>Lokasi: <span style="color: #475569;"><?= esc($u['dusun']) ?></span></div>
                        </div>

                        <!-- Tombol Hubungi WhatsApp & Detail -->
                        <?php 
                            $waClean = preg_replace('/[^0-9]/', '', $u['whatsapp']);
                            if (substr($waClean, 0, 1) === '0') {
                                $waClean = '62' . substr($waClean, 1);
                            }
                            $pesanWa = urlencode("Halo, saya tertarik dengan produk " . $u['nama_usaha'] . " di Website Desa Batu Bingkung.");
                        ?>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                            <a href="<?= base_url('umkm/' . $u['id']) ?>" 
                               style="display: flex; align-items: center; justify-content: center; gap: 0.3rem; padding: 0.6rem; border-radius: 8px; background: #ecfdf5; color: #059669; font-weight: 700; font-size: 0.82rem; text-decoration: none; border: 1px solid #a7f3d0;">
                                <i data-lucide="eye" style="width: 14px; height: 14px;"></i> Detail
                            </a>
                            <a href="https://wa.me/<?= $waClean ?>?text=<?= $pesanWa ?>" target="_blank" 
                               style="display: flex; align-items: center; justify-content: center; gap: 0.3rem; padding: 0.6rem; border-radius: 8px; background: #25d366; color: #ffffff; font-weight: 700; font-size: 0.82rem; text-decoration: none;">
                                <i data-lucide="phone" style="width: 14px; height: 14px;"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 2. Bagian Wisata Desa -->
    <div>
        <div style="margin-bottom: 1.5rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;">Destinasi & Daya Tarik</span>
            <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 0.2rem;">Pesona Wisata Bahari & Alam Desa</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 1.75rem;">
            <?php foreach ($wisataList as $w): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">
                    <a href="<?= base_url('wisata/' . $w['slug']) ?>" style="display: block; height: 220px; background: #f1f5f9; position: relative;">
                        <?php $fotoW = !empty($w['foto']) ? $w['foto'] : 'images/pantai-ngapalohe.webp'; ?>
                        <img src="<?= base_url($fotoW) ?>" alt="<?= esc($w['nama']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <span style="position: absolute; bottom: 12px; left: 12px; padding: 0.3rem 0.75rem; border-radius: 9999px; background: rgba(0,0,0,0.7); color: #fff; font-size: 0.75rem; font-weight: 600;">
                            <?= esc($w['kategori']) ?>
                        </span>
                    </a>
                    <div style="padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 0.5rem;">
                            <a href="<?= base_url('wisata/' . $w['slug']) ?>" style="color: inherit; text-decoration: none;">
                                <?= esc($w['nama']) ?>
                            </a>
                        </h3>
                        <p style="font-size: 0.88rem; color: #64748b; line-height: 1.6; margin-bottom: 1rem; flex-grow: 1;">
                            <?= esc($w['deskripsi']) ?>
                        </p>

                        <!-- Fasilitas & Jam Buka -->
                        <div style="background: #f8fafc; border-radius: 10px; padding: 0.85rem; font-size: 0.82rem; margin-bottom: 1rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.35rem;">
                                <span style="color: #64748b;">Tiket Masuk:</span>
                                <strong style="color: #059669;"><?= esc($w['harga_tiket']) ?></strong>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.35rem;">
                                <span style="color: #64748b;">Jam Buka:</span>
                                <span style="color: #1e293b; font-weight: 600;"><?= esc($w['jam_buka']) ?></span>
                            </div>
                            <div style="margin-top: 0.35rem; color: #64748b;">
                                <strong>Fasilitas:</strong> <?= esc($w['fasilitas']) ?>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: <?= !empty($w['maps_url']) ? '1fr 1fr' : '1fr' ?>; gap: 0.5rem;">
                            <a href="<?= base_url('wisata/' . $w['slug']) ?>" 
                               style="display: flex; align-items: center; justify-content: center; gap: 0.3rem; padding: 0.65rem; border-radius: 8px; background: #ecfdf5; color: #059669; font-weight: 700; font-size: 0.85rem; text-decoration: none; border: 1px solid #a7f3d0;">
                                <i data-lucide="info" style="width: 15px; height: 15px;"></i> Detail Wisata
                            </a>
                            <?php if (!empty($w['maps_url'])): ?>
                                <a href="<?= esc($w['maps_url']) ?>" target="_blank" 
                                   style="display: flex; align-items: center; justify-content: center; gap: 0.3rem; padding: 0.65rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 600; font-size: 0.85rem; text-decoration: none;">
                                    <i data-lucide="map" style="width: 15px; height: 15px;"></i> Rute Maps
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
