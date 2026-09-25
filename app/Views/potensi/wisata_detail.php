<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <a href="<?= base_url('potensi') ?>" style="color: inherit; text-decoration: none;">Wisata Desa</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Detail Wisata</span>
        </div>
        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(255,255,255,0.2); font-size: 0.8rem; font-weight: 700; margin-bottom: 0.5rem;">
            <?= esc($item['kategori']) ?> &bull; <?= esc($item['lokasi'] ?? 'Desa Batu Bingkung') ?>
        </span>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;"><?= esc($item['nama']) ?></h1>
        <p style="color: #d1fae5; font-size: 0.95rem;">
            Pengelola: <strong style="color: #ffffff;"><?= esc($item['kontak_pengelola'] ?? 'Pokdarwis Desa Batu Bingkung') ?></strong>
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2.5rem; padding-bottom: 4rem;">
    <div class="mobile-stack-1col" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem; align-items: start;">
        <div>
            <!-- Foto Utama -->
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.03); margin-bottom: 2rem;">
                <div style="height: 380px; background: #f1f5f9;">
                    <?php $fotoW = !empty($item['foto']) ? $item['foto'] : 'images/pantai-ngapalohe.webp'; ?>
                    <img src="<?= base_url($fotoW) ?>" alt="<?= esc($item['nama']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Uraian & Daya Tarik -->
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">Daya Tarik &amp; Keindahan</h3>
                <p style="font-size: 0.95rem; color: #334155; line-height: 1.8; margin-bottom: 1.5rem;">
                    <?= nl2br(esc($item['deskripsi'])) ?>
                </p>

                <?php if (!empty($item['daya_tarik'])): ?>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 1.25rem; border-radius: 8px;">
                        <h4 style="font-size: 0.92rem; font-weight: 800; color: #065f46; margin-bottom: 0.35rem;">Keistimewaan Khusus:</h4>
                        <p style="font-size: 0.88rem; color: #047857; line-height: 1.6;">
                            <?= nl2br(esc($item['daya_tarik'])) ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Kolom Info Praktis Wisatawan -->
        <div>
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03); margin-bottom: 2rem;">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin-bottom: 1.25rem;">Informasi Kunjungan</h3>

                <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.88rem;">
                    <div style="border-bottom: 1px solid #f1f5f9; padding-bottom: 0.75rem;">
                        <div style="color: #64748b; font-size: 0.78rem;">Harga Tiket Masuk</div>
                        <div style="font-size: 1.2rem; font-weight: 800; color: #0b6045;"><?= esc($item['harga_tiket'] ?? 'Gratis') ?></div>
                    </div>

                    <div style="border-bottom: 1px solid #f1f5f9; padding-bottom: 0.75rem;">
                        <div style="color: #64748b; font-size: 0.78rem;">Jam Buka / Operasional</div>
                        <strong style="color: #1e293b;"><?= esc($item['jam_buka'] ?? 'Setiap Hari 24 Jam') ?></strong>
                    </div>

                    <div style="border-bottom: 1px solid #f1f5f9; padding-bottom: 0.75rem;">
                        <div style="color: #64748b; font-size: 0.78rem;">Fasilitas Tersedia</div>
                        <div style="color: #334155; line-height: 1.5;"><?= esc($item['fasilitas'] ?? 'Gazebo, area parkir, warung warga') ?></div>
                    </div>

                    <div style="border-bottom: 1px solid #f1f5f9; padding-bottom: 0.75rem;">
                        <div style="color: #64748b; font-size: 0.78rem;">Kontak Pengelola</div>
                        <strong style="color: #1e293b;"><?= esc($item['kontak_pengelola'] ?? '-') ?></strong>
                    </div>
                </div>

                <?php if (!empty($item['maps_url'])): ?>
                    <div style="margin-top: 1.5rem;">
                        <a href="<?= esc($item['maps_url']) ?>" target="_blank" 
                           style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; text-decoration: none;">
                            <i data-lucide="map" style="width: 17px; height: 17px;"></i> Petunjuk Google Maps
                        </a>
                    </div>
                <?php endif; ?>

                <div style="margin-top: 1.25rem; text-align: center;">
                    <a href="<?= base_url('potensi') ?>" style="color: #64748b; font-size: 0.85rem; font-weight: 600; text-decoration: none;">
                        &larr; Kembali ke Daftar Wisata
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
