<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Potensi Desa</h2>
    <a href="<?= base_url('admin/potensi/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Potensi Baru</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Foto</th>
                    <th>Judul Potensi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($potensiList)) : ?>
                    <?php foreach ($potensiList as $p) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url(esc($p['image'] ?? 'uploads/desa/kantor-desa.webp')) ?>" alt="<?= esc($p['judul']) ?>" style="width: 68px; height: 48px; object-fit: cover; border-radius: 6px;">
                            </td>
                            <td>
                                <div style="font-weight: 700; color: #1e293b;"><?= esc($p['judul']) ?></div>
                                <div style="font-size: 0.775rem; color: #64748b;"><?= character_limiter(esc($p['deskripsi']), 70) ?></div>
                            </td>
                            <td>
                                <span style="background: #fef9c3; color: #854d0e; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">
                                    <?= esc($p['kategori']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($p['status'] === 'published') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Published</span>
                                <?php else : ?>
                                    <span style="background: #fef3c7; color: #92400e; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/potensi/edit/' . $p['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/potensi/delete/' . $p['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus data potensi ini?');">
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
                        <td colspan="5" style="text-align: center; color: #64748b; padding: 2rem;">
                            Belum ada data potensi desa.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
