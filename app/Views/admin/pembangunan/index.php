<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
        <p style="font-size: 0.85rem; color: #64748b;">Kelola data proyek, anggaran, progres fisik, dan dokumentasi foto pembangunan</p>
    </div>
    <a href="<?= base_url('admin/pembangunan/create') ?>" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.6rem 1.25rem; background: #0b6045; color: #ffffff; border-radius: 8px; font-weight: 700; font-size: 0.85rem; text-decoration: none;">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i> Tambah Kegiatan
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 0.85rem 1rem; border-radius: 6px; margin-bottom: 1.5rem; color: #065f46; font-size: 0.88rem;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.88rem; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                    <th style="padding: 0.85rem 1rem; width: 60px;">Tahun</th>
                    <th style="padding: 0.85rem 1rem;">Nama Kegiatan & Lokasi</th>
                    <th style="padding: 0.85rem 1rem;">Anggaran & Sumber</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 120px;">Progres</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 110px;">Status</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list)): ?>
                    <tr><td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada kegiatan pembangunan terdata.</td></tr>
                <?php else: ?>
                    <?php foreach ($list as $row): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 0.85rem 1rem; font-weight: 800; color: #0b6045;"><?= esc($row['tahun']) ?></td>
                            <td style="padding: 0.85rem 1rem;">
                                <div style="font-weight: 700; color: #0f172a; font-size: 0.92rem;"><?= esc($row['nama_kegiatan']) ?></div>
                                <div style="font-size: 0.78rem; color: #64748b;"><?= esc($row['lokasi']) ?> &bull; <?= esc($row['dusun']) ?></div>
                            </td>
                            <td style="padding: 0.85rem 1rem;">
                                <div style="font-weight: 700; color: #059669;">Rp <?= number_format($row['anggaran'], 0, ',', '.') ?></div>
                                <small style="color: #64748b;"><?= esc($row['sumber_dana']) ?></small>
                            </td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <div style="font-weight: 800; color: <?= $row['progres'] >= 100 ? '#059669' : '#d97706' ?>;"><?= $row['progres'] ?>%</div>
                                <div style="width: 100%; height: 5px; background: #e2e8f0; border-radius: 3px; overflow: hidden; margin-top: 0.2rem;">
                                    <div style="width: <?= min(100, $row['progres']) ?>%; height: 100%; background: <?= $row['progres'] >= 100 ? '#10b981' : '#f59e0b' ?>;"></div>
                                </div>
                            </td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <span style="font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 4px; text-transform: uppercase; <?= $row['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : 'background: #fef3c7; color: #d97706;' ?>">
                                    <?= esc($row['status']) ?>
                                </span>
                            </td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.4rem; justify-content: center;">
                                    <a href="<?= base_url('admin/pembangunan/edit/' . $row['id']) ?>" style="padding: 0.35rem 0.6rem; border-radius: 6px; background: #fef3c7; color: #d97706; font-size: 0.78rem; font-weight: 700; text-decoration: none;">
                                        Edit
                                    </a>
                                    <form method="post" action="<?= base_url('admin/pembangunan/delete/' . $row['id']) ?>" onsubmit="return confirm('Hapus kegiatan ini?');" style="display: inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" style="padding: 0.35rem 0.6rem; border-radius: 6px; background: #fee2e2; color: #ef4444; border: none; font-size: 0.78rem; font-weight: 700; cursor: pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
