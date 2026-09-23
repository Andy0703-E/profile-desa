<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Berita &amp; Artikel</h2>
    <a href="<?= base_url('admin/berita/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Berita Baru</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Media</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($beritaList)) : ?>
                    <?php foreach ($beritaList as $b) : ?>
                        <tr>
                            <td>
                                <?php if (! empty($b['thumbnail'])) : ?>
                                    <img src="<?= base_url(esc($b['thumbnail'])) ?>" alt="thumb" style="width: 64px; height: 48px; object-fit: cover; border-radius: 6px;">
                                <?php else : ?>
                                    <div style="width: 64px; height: 48px; background: #f1f5f9; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                        <i data-lucide="image" style="width: 20px; height: 20px;"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: #1e293b; margin-bottom: 0.25rem;"><?= esc($b['title']) ?></div>
                                <div style="font-size: 0.75rem; color: #64748b;">
                                    Oleh: <?= esc($b['author_name'] ?? 'Admin') ?> • <?= number_format($b['views']) ?> dilihat
                                </div>
                            </td>
                            <td>
                                <span style="background: #f1f5f9; color: #475569; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">
                                    <?= esc($b['category_name']) ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                    $bg = 'bg-gray-100 text-gray-700';
                                    if ($b['status'] === 'published') $bg = 'background: #dcfce7; color: #166534;';
                                    elseif ($b['status'] === 'draft') $bg = 'background: #fef3c7; color: #92400e;';
                                    elseif ($b['status'] === 'archived') $bg = 'background: #f1f5f9; color: #475569;';
                                ?>
                                <span style="<?= $bg ?> padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                    <?= esc($b['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?= $b['published_at'] ? date('d/m/Y H:i', strtotime($b['published_at'])) : '-' ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/berita/edit/' . $b['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/berita/delete/' . $b['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?');">
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
                            Belum ada data berita. Silakan tambahkan berita baru.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
