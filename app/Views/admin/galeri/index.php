<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Galeri Dokumentasi</h2>
    <a href="<?= base_url('admin/galeri/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Foto Galeri</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 100px;">Foto</th>
                    <th>Judul &amp; Deskripsi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($galeriList)) : ?>
                    <?php foreach ($galeriList as $g) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url(esc($g['image'])) ?>" alt="<?= esc($g['title']) ?>" style="width: 80px; height: 54px; object-fit: cover; border-radius: 6px;">
                            </td>
                            <td>
                                <div style="font-weight: 700; color: #1e293b;"><?= esc($g['title']) ?></div>
                                <div style="font-size: 0.775rem; color: #64748b;"><?= esc($g['description'] ?? '-') ?></div>
                            </td>
                            <td>
                                <span style="background: #f1f5f9; color: #475569; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">
                                    <?= esc($g['category_name'] ?? 'Umum') ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($g['status'] === 'published') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Published</span>
                                <?php else : ?>
                                    <span style="background: #fef3c7; color: #92400e; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/galeri/edit/' . $g['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/galeri/delete/' . $g['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus dokumentasi foto ini?');">
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
                            Belum ada foto dokumentasi galeri.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
