<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <a href="<?= base_url('potensi') ?>" style="color: inherit; text-decoration: none;">Potensi &amp; UMKM</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Detail Produk</span>
        </div>
        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 9999px; background: rgba(255,255,255,0.2); font-size: 0.8rem; font-weight: 700; margin-bottom: 0.5rem;">
            <?= esc($item['kategori']) ?> &bull; <?= esc($item['dusun'] ?? 'Desa Batu Bingkung') ?>
        </span>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;"><?= esc($item['nama_usaha']) ?></h1>
        <p style="color: #d1fae5; font-size: 0.95rem;">
            Pemilik: <strong style="color: #ffffff;"><?= esc($item['nama_pemilik']) ?></strong>
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2.5rem; padding-bottom: 4rem;">
    <div class="mobile-stack-1col" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 2.5rem; align-items: start;">
        <!-- Foto Produk -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
            <div style="height: 380px; background: #f1f5f9; position: relative;">
                <?php $fotoU = !empty($item['foto']) ? $item['foto'] : 'images/berita-tani.webp'; ?>
                <img src="<?= base_url($fotoU) ?>" alt="<?= esc($item['nama_usaha']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                <?php if ($item['is_unggulan']): ?>
                    <span style="position: absolute; top: 14px; left: 14px; padding: 0.35rem 0.85rem; border-radius: 6px; background: #f59e0b; color: #fff; font-size: 0.75rem; font-weight: 700;">
                        Produk Unggulan
                    </span>
                <?php endif; ?>
                <?php if ($item['is_bumdes']): ?>
                    <span style="position: absolute; top: 14px; right: 14px; padding: 0.35rem 0.85rem; border-radius: 6px; background: #0b6045; color: #fff; font-size: 0.75rem; font-weight: 700;">
                        Kelolaan BUMDes
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Rincian Produk & Pemesanan -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
            <span style="font-size: 0.78rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;"><?= esc($item['kategori']) ?></span>
            <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0.25rem 0 0.75rem;"><?= esc($item['nama_usaha']) ?></h2>
            <div style="font-size: 1.6rem; font-weight: 800; color: #0b6045; margin-bottom: 1.25rem;"><?= esc($item['harga']) ?></div>

            <div style="border-top: 1px solid #f1f5f9; padding-top: 1rem; margin-bottom: 1.25rem;">
                <h4 style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">Deskripsi Produk</h4>
                <p style="font-size: 0.92rem; color: #475569; line-height: 1.7;">
                    <?= nl2br(esc($item['deskripsi'])) ?>
                </p>
            </div>

            <div style="background: #f8fafc; border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.5rem;">
                <div>Pemilik Usaha: <strong style="color: #0f172a;"><?= esc($item['nama_pemilik']) ?></strong></div>
                <div>Wilayah Dusun: <span style="color: #0f172a; font-weight: 600;"><?= esc($item['dusun'] ?? '-') ?></span></div>
                <?php if (!empty($item['alamat'])): ?>
                    <div>Alamat Usaha: <span style="color: #0f172a;"><?= esc($item['alamat']) ?></span></div>
                <?php endif; ?>
            </div>

            <?php 
                $waClean = preg_replace('/[^0-9]/', '', $item['whatsapp']);
                if (substr($waClean, 0, 1) === '0') {
                    $waClean = '62' . substr($waClean, 1);
                }
                $pesanWa = urlencode("Halo, saya tertarik dengan produk " . $item['nama_usaha'] . " dari website resmi Desa Batu Bingkung.");
            ?>
            <a href="https://wa.me/<?= $waClean ?>?text=<?= $pesanWa ?>" target="_blank" 
               style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.85rem; border-radius: 10px; background: #25d366; color: #ffffff; font-weight: 700; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 15px rgba(37,211,102,0.3); margin-bottom: 1rem;">
                <i data-lucide="phone" style="width: 18px; height: 18px;"></i> Pesan Langsung via WhatsApp
            </a>

            <a href="<?= base_url('potensi') ?>" style="display: block; text-align: center; color: #64748b; font-size: 0.85rem; font-weight: 600; text-decoration: none;">
                &larr; Kembali ke Katalog UMKM
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
