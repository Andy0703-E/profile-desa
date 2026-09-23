<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Pengumuman Resmi</h2>
    <a href="<?= base_url('admin/pengumuman/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Pengumuman</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Judul Pengumuman</th>
                    <th>Prioritas</th>
                    <th>Tanggal Berlaku</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($pengumumanList)) : ?>
                    <?php foreach ($pengumumanList as $p) : ?>
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: #1e293b;"><?= esc($p['judul']) ?></div>
                                <div style="font-size: 0.775rem; color: #64748b;"><?= character_limiter(esc($p['isi']), 80) ?></div>
                            </td>
                            <td>
                                <?php
                                    $prioBg = 'background: #f1f5f9; color: #475569;';
                                    if ($p['prioritas'] === 'mendesak') $prioBg = 'background: #fee2e2; color: #991b1b;';
                                    elseif ($p['prioritas'] === 'penting') $prioBg = 'background: #fef3c7; color: #92400e;';
                                ?>
                                <span style="<?= $prioBg ?> padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                    <?= esc($p['prioritas']) ?>
                                </span>
                            </td>
                            <td style="font-size: 0.85rem; color: #334155;">
                                <?= date('d F Y', strtotime($p['tanggal'])) ?>
                            </td>
                            <td>
                                <?php if ($p['status'] === 'aktif') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">Aktif</span>
                                <?php else : ?>
                                    <span style="background: #f1f5f9; color: #64748b; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">Nonaktif</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/pengumuman/edit/' . $p['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/pengumuman/delete/' . $p['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus pengumuman ini?');">
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
                            Belum ada pengumuman yang diterbitkan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
