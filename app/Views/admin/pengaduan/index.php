<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
        <p style="font-size: 0.85rem; color: #64748b;">Pantau dan tanggapi laporan keluhan atau aspirasi yang masuk dari masyarakat</p>
    </div>

    <!-- Filter Status -->
    <div style="display: flex; gap: 0.5rem;">
        <a href="<?= base_url('admin/pengaduan?status=semua') ?>" 
           style="padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; text-decoration: none; <?= $selectedStatus === 'semua' ? 'background: #0b6045; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
            Semua
        </a>
        <a href="<?= base_url('admin/pengaduan?status=diajukan') ?>" 
           style="padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; text-decoration: none; <?= $selectedStatus === 'diajukan' ? 'background: #f59e0b; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
            Menunggu
        </a>
        <a href="<?= base_url('admin/pengaduan?status=diproses') ?>" 
           style="padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; text-decoration: none; <?= $selectedStatus === 'diproses' ? 'background: #2563eb; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
            Diproses
        </a>
        <a href="<?= base_url('admin/pengaduan?status=selesai') ?>" 
           style="padding: 0.35rem 0.85rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600; text-decoration: none; <?= $selectedStatus === 'selesai' ? 'background: #10b981; color: #fff;' : 'background: #f1f5f9; color: #475569;' ?>">
            Selesai
        </a>
    </div>
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
                    <th style="padding: 0.85rem 1rem; width: 140px;">Kode Tiket</th>
                    <th style="padding: 0.85rem 1rem;">Pelapor & Kontak</th>
                    <th style="padding: 0.85rem 1rem;">Pokok Laporan</th>
                    <th style="padding: 0.85rem 1rem; width: 120px;">Kategori</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 110px;">Status</th>
                    <th style="padding: 0.85rem 1rem; text-align: center; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($list)): ?>
                    <tr><td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada laporan pengaduan masuk.</td></tr>
                <?php else: ?>
                    <?php foreach ($list as $row): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 0.85rem 1rem; font-family: monospace; font-weight: 700; color: #0b6045;"><?= esc($row['kode_tiket']) ?></td>
                            <td style="padding: 0.85rem 1rem;">
                                <div style="font-weight: 700; color: #0f172a;"><?= esc($row['nama_pelapor']) ?></div>
                                <small style="color: #64748b;"><?= esc($row['no_hp']) ?> &bull; <?= esc($row['dusun']) ?></small>
                            </td>
                            <td style="padding: 0.85rem 1rem;">
                                <div style="font-weight: 600; color: #1e293b;"><?= esc($row['judul']) ?></div>
                                <small style="color: #94a3b8;"><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></small>
                            </td>
                            <td style="padding: 0.85rem 1rem;">
                                <span style="font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 4px; background: #f1f5f9; color: #475569;">
                                    <?= esc($row['kategori']) ?>
                                </span>
                            </td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <span style="font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.5rem; border-radius: 4px; text-transform: uppercase; 
                                    <?= $row['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : ($row['status'] === 'diproses' ? 'background: #eff6ff; color: #2563eb;' : 'background: #fef3c7; color: #d97706;') ?>">
                                    <?= esc($row['status']) ?>
                                </span>
                            </td>
                            <td style="padding: 0.85rem 1rem; text-align: center;">
                                <div style="display: flex; gap: 0.4rem; justify-content: center;">
                                    <a href="<?= base_url('admin/pengaduan/detail/' . $row['id']) ?>" style="padding: 0.35rem 0.6rem; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 0.78rem; font-weight: 700; text-decoration: none;">
                                        Tanggapi
                                    </a>
                                    <form method="post" action="<?= base_url('admin/pengaduan/delete/' . $row['id']) ?>" onsubmit="return confirm('Hapus laporan ini?');" style="display: inline;">
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
