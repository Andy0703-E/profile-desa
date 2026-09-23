<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Layanan Publik</h2>
    <a href="<?= base_url('admin/layanan/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Layanan Baru</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th>Nama Layanan</th>
                    <th>Estimasi Waktu</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($layananList)) : ?>
                    <?php foreach ($layananList as $lay) : ?>
                        <tr>
                            <td style="text-align: center; font-weight: 700; color: #64748b;"><?= esc($lay['urutan']) ?></td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #f0fdf4; color: #15803d; display: flex; align-items: center; justify-content: center;">
                                        <i data-lucide="<?= esc($lay['icon']) ?>" style="width: 16px; height: 16px;"></i>
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: #1e293b;"><?= esc($lay['nama_layanan']) ?></div>
                                        <div style="font-size: 0.75rem; color: #64748b;">Oleh: <?= esc($lay['penanggung_jawab']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.85rem; font-weight: 500; color: #334155;">
                                    <i data-lucide="clock" style="width: 14px; height: 14px; vertical-align: -2px; color: #94a3b8;"></i>
                                    <?= esc($lay['estimasi_waktu']) ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: 700; color: #15803d; font-size: 0.85rem;">
                                    <?= esc($lay['biaya']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($lay['status'] === 'aktif') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Aktif</span>
                                <?php else : ?>
                                    <span style="background: #fee2e2; color: #991b1b; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Nonaktif</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/layanan/edit/' . $lay['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/layanan/delete/' . $lay['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus layanan ini? Ini akan memengaruhi pengajuan terkait.');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-sm-delete" title="Hapus">
                                            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 2rem;">
                            Belum ada data layanan publik.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
