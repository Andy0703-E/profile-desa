<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
        <p style="font-size: 0.85rem; color: #64748b;">Ringkasan data, laporan masuk, dan aktivitas portal pemerintahan desa.</p>
    </div>
</div>

<!-- 4 Grid Stat Cards Atas -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
            <i data-lucide="message-square-plus" style="width: 24px; height: 24px;"></i>
        </div>
        <div>
            <div style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Aduan Masuk</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= $countPengaduan ?></div>
        </div>
    </div>

    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
            <i data-lucide="shopping-bag" style="width: 24px; height: 24px;"></i>
        </div>
        <div>
            <div style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">UMKM & Usaha</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= $countUmkm ?></div>
        </div>
    </div>

    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center;">
            <i data-lucide="palmtree" style="width: 24px; height: 24px;"></i>
        </div>
        <div>
            <div style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Objek Wisata</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= $countWisata ?></div>
        </div>
    </div>

    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
        <div style="width: 48px; height: 48px; border-radius: 10px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center;">
            <i data-lucide="hard-hat" style="width: 24px; height: 24px;"></i>
        </div>
        <div>
            <div style="font-size: 0.75rem; color: #64748b; font-weight: 700; text-transform: uppercase;">Kegiatan Pembangunan</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= $countPembangunan ?></div>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <!-- Laporan Masuk Terbaru -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 1.1rem; font-weight: 800; color: #0f172a;">Pengaduan Warga Terbaru</h2>
            <a href="<?= base_url('admin/pengaduan') ?>" style="font-size: 0.8rem; font-weight: 600; color: #0b6045; text-decoration: none;">Lihat Semua &rarr;</a>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem; text-align: left;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                        <th style="padding: 0.85rem 1.5rem; color: #475569;">Pelapor</th>
                        <th style="padding: 0.85rem 1.5rem; color: #475569;">Judul Laporan</th>
                        <th style="padding: 0.85rem 1.5rem; color: #475569;">Status</th>
                        <th style="padding: 0.85rem 1.5rem; color: #475569;">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($latestAduan)): ?>
                        <tr><td colspan="4" style="padding: 1.5rem; text-align: center; color: #94a3b8;">Belum ada pengaduan terbaru.</td></tr>
                    <?php else: ?>
                        <?php foreach ($latestAduan as $row): ?>
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 0.85rem 1.5rem; font-weight: 600; color: #1e293b;"><?= esc($row['nama_pelapor']) ?></td>
                                <td style="padding: 0.85rem 1.5rem; color: #475569;">
                                    <a href="<?= base_url('admin/pengaduan/detail/' . $row['id']) ?>" style="color: #0284c7; text-decoration: none; font-weight: 600;">
                                        <?= esc($row['judul']) ?>
                                    </a>
                                </td>
                                <td style="padding: 0.85rem 1.5rem;">
                                    <span style="font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 4px; text-transform: uppercase; 
                                        <?= $row['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : ($row['status'] === 'diproses' ? 'background: #eff6ff; color: #2563eb;' : 'background: #fef3c7; color: #d97706;') ?>">
                                        <?= esc($row['status']) ?>
                                    </span>
                                </td>
                                <td style="padding: 0.85rem 1.5rem; color: #64748b; font-size: 0.8rem;">
                                    <?= date('d M, H:i', strtotime($row['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Artikel Berita Terakhir -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 1.1rem; font-weight: 800; color: #0f172a;">Berita Terpublikasi</h2>
            <a href="<?= base_url('admin/berita') ?>" style="font-size: 0.8rem; font-weight: 600; color: #0b6045; text-decoration: none;">Selengkapnya &rarr;</a>
        </div>
        <div style="padding: 1rem 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
            <?php if (empty($latestBerita)): ?>
                <div style="text-align: center; color: #94a3b8; padding: 1rem 0;">Belum ada berita.</div>
            <?php else: ?>
                <?php foreach ($latestBerita as $b): ?>
                    <div style="display: flex; gap: 1rem; align-items: flex-start; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem;">
                        <div style="width: 60px; height: 60px; border-radius: 8px; background: #e2e8f0; overflow: hidden; flex-shrink: 0;">
                            <?php $thumb = !empty($b['thumbnail']) ? $b['thumbnail'] : 'images/berita-meeting.webp'; ?>
                            <img src="<?= base_url($thumb) ?>" alt="<?= esc($b['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h4 style="font-size: 0.9rem; font-weight: 700; color: #1e293b; line-height: 1.4; margin-bottom: 0.2rem;">
                                <a href="<?= base_url('berita/' . $b['slug']) ?>" target="_blank" style="color: inherit; text-decoration: none;">
                                    <?= esc($b['title']) ?>
                                </a>
                            </h4>
                            <div style="font-size: 0.75rem; color: #64748b;">
                                <?= date('d M Y', strtotime($b['created_at'])) ?> &bull; <span style="color: #059669; font-weight: 600;"><?= esc($b['status']) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
