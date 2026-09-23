<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
        <p style="font-size: 0.85rem; color: #64748b;">Kelola data wilayah dusun, nama kepala dusun, jumlah KK, dan jumlah jiwa</p>
    </div>
    <a href="<?= base_url('admin/dusun/create') ?>" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.6rem 1.25rem; background: #0b6045; color: #ffffff; border-radius: 8px; font-weight: 700; font-size: 0.85rem; text-decoration: none;">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i> Tambah Dusun
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
                    <th style="padding: 0.85rem 1rem;">Nama Dusun</th>
                    <th style="padding: 0.85rem 1rem;">Kepala Dusun</th>
                    <th style="padding: 0.85rem 1rem; text-align: center;">RT / RW</th>
                    <th style="padding: 0.85rem 1rem; text-align: center;">Jumlah KK</th>
                    <th style="padding: 0.85rem 1rem; text-align: center;">Jumlah Jiwa</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list)): ?>
                    <tr><td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada dusun terdata.</td></tr>
                <?php else: ?>
                    <?php foreach ($list as $row): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 0.85rem 1rem; font-weight: 700; color: #0f172a;"><?= esc($row['nama_dusun']) ?></td>
                            <td style="padding: 0.85rem 1rem; color: #475569;"><?= esc($row['kepala_dusun']) ?></td>
                            <td style="padding: 0.85rem 1rem; text-align: center;"><?= $row['jumlah_rt'] ?> RT / <?= $row['jumlah_rw'] ?> RW</td>
                            <td style="padding: 0.85rem 1rem; text-align: center; font-weight: 700; color: #0b6045;"><?= $row['jumlah_kk'] ?> KK</td>
                            <td style="padding: 0.85rem 1rem; text-align: center; font-weight: 700; color: #1e293b;"><?= $row['jumlah_jiwa'] ?> Jiwa</td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.4rem; justify-content: center;">
                                    <a href="<?= base_url('admin/dusun/edit/' . $row['id']) ?>" style="padding: 0.35rem 0.6rem; border-radius: 6px; background: #fef3c7; color: #d97706; font-size: 0.78rem; font-weight: 700; text-decoration: none;">
                                        Edit
                                    </a>
                                    <form method="post" action="<?= base_url('admin/dusun/delete/' . $row['id']) ?>" onsubmit="return confirm('Hapus dusun ini?');" style="display: inline;">
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
