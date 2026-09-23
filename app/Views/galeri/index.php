<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Galeri Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Dokumentasi Foto & Video Desa</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Koleksi dokumentasi visual kegiatan pemerintahan, gotong royong, keindahan pesisir pantai, dan video profil <?= esc($desa['nama_desa']) ?>.
        </p>

        <!-- Tab Toggle Foto & Video -->
        <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem;">
            <a href="<?= base_url('galeri?tab=foto') ?>" 
               style="padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.88rem; text-decoration: none; <?= $activeTab === 'foto' ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                <i data-lucide="image" style="width: 15px; height: 15px; display: inline; vertical-align: middle;"></i> Galeri Foto (<?= count($fotos) ?>)
            </a>
            <a href="<?= base_url('galeri?tab=video') ?>" 
               style="padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.88rem; text-decoration: none; <?= $activeTab === 'video' ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                <i data-lucide="video" style="width: 15px; height: 15px; display: inline; vertical-align: middle;"></i> Video Dokumentasi (<?= count($videos) ?>)
            </a>
        </div>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <?php if ($activeTab === 'video'): ?>
        <!-- Tab Video -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 2rem;">
            <?php foreach ($videos as $v): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
                        <iframe src="<?= esc($v['embed_url']) ?>" style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;" allowfullscreen></iframe>
                    </div>
                    <div style="padding: 1.25rem;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">
                            Durasi: <?= esc($v['durasi']) ?> &bull; <?= date('d M Y', strtotime($v['tanggal'])) ?>
                        </span>
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: #0f172a; margin: 0.35rem 0 0.5rem;">
                            <?= esc($v['judul']) ?>
                        </h3>
                        <p style="font-size: 0.85rem; color: #475569; line-height: 1.5;">
                            <?= esc($v['keterangan']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Tab Foto -->
        <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
            <a href="<?= base_url('galeri?tab=foto&kategori=semua') ?>" 
               style="padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.82rem; font-weight: 600; text-decoration: none; <?= $currentCat === 'semua' ? 'background: #0b6045; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
                Semua Album
            </a>
            <?php foreach ($categories as $c): ?>
                <a href="<?= base_url('galeri?tab=foto&kategori=' . urlencode($c['slug'])) ?>" 
                   style="padding: 0.4rem 1rem; border-radius: 9999px; font-size: 0.82rem; font-weight: 600; text-decoration: none; <?= $currentCat === $c['slug'] ? 'background: #0b6045; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
                    <?= esc($c['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.25rem;">
            <?php foreach ($fotos as $f): ?>
                <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
                    <div style="height: 190px; background: #e2e8f0;">
                        <img src="<?= base_url($f['image']) ?>" alt="<?= esc($f['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 1rem;">
                        <span style="font-size: 0.72rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                            <?= esc($f['category_name']) ?>
                        </span>
                        <h4 style="font-size: 0.95rem; font-weight: 700; color: #0f172a; margin: 0.2rem 0 0.4rem;">
                            <?= esc($f['title']) ?>
                        </h4>
                        <?php if (!empty($f['description'])): ?>
                            <p style="font-size: 0.8rem; color: #64748b; line-height: 1.4;">
                                <?= esc($f['description']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
