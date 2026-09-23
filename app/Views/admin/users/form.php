<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($user);
$actionUrl = $isEdit ? base_url('admin/users/update/' . $user['id']) : base_url('admin/users/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/users') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Pengguna Admin' : 'Tambah Pengguna Admin Baru' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 700px;">
    <form action="<?= $actionUrl ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Nama Lengkap <span style="color: #ef4444;">*</span></label>
            <input type="text" name="name" class="form-control" value="<?= esc(old('name', $user['name'] ?? '')) ?>" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Username <span style="color: #ef4444;">*</span></label>
                <input type="text" name="username" class="form-control" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Alamat Email <span style="color: #ef4444;">*</span></label>
                <input type="email" name="email" class="form-control" value="<?= esc(old('email', $user['email'] ?? '')) ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Kata Sandi <?= $isEdit ? '(Kosongkan jika tidak ingin mengubah)' : '<span style="color: #ef4444;">*</span>' ?></label>
            <input type="password" name="password" class="form-control" <?= $isEdit ? '' : 'required' ?> minlength="6" placeholder="Minimal 6 karakter">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Peran (Role) <span style="color: #ef4444;">*</span></label>
                <select name="role" class="form-control" required>
                    <option value="admin" <?= old('role', $user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin Desa</option>
                    <option value="superadmin" <?= old('role', $user['role'] ?? '') === 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Status Akun <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="active" <?= old('status', $user['status'] ?? '') === 'active' ? 'selected' : '' ?>>Aktif (Dapat login)</option>
                    <option value="inactive" <?= old('status', $user['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Nonaktif (Diblokir)</option>
                </select>
            </div>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Buat User' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
