<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Pengguna Admin</h2>
    <a href="<?= base_url('admin/users/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah User Baru</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userList as $u) : ?>
                    <tr>
                        <td style="font-weight: 700; color: #0f172a;"><?= esc($u['name']) ?></td>
                        <td style="font-family: monospace; color: #15803d;"><?= esc($u['username']) ?></td>
                        <td><?= esc($u['email']) ?></td>
                        <td>
                            <span style="background: #f1f5f9; color: #475569; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                <?= esc($u['role']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($u['status'] === 'active') : ?>
                                <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">Aktif</span>
                            <?php else : ?>
                                <span style="background: #fee2e2; color: #991b1b; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: right;">
                            <div class="action-btns" style="justify-content: flex-end;">
                                <a href="<?= base_url('admin/users/edit/' . $u['id']) ?>" class="btn-sm-edit" title="Edit">
                                    <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                </a>
                                <?php if ($u['id'] !== (int) session('userId')) : ?>
                                    <form action="<?= base_url('admin/users/delete/' . $u['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus pengguna ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-sm-delete" title="Hapus">
                                            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
