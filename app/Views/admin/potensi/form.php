<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($potensi);
$actionUrl = $isEdit ? base_url('admin/potensi/update/' . $potensi['id']) : base_url('admin/potensi/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/potensi') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Potensi Desa' : 'Tambah Potensi Desa' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Judul Potensi <span style="color: #ef4444;">*</span></label>
            <input type="text" name="judul" class="form-control" value="<?= esc(old('judul', $potensi['judul'] ?? '')) ?>" required placeholder="Contoh: Potensi Perikanan Tangkap Tradisional">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                <input type="text" name="kategori" class="form-control" value="<?= esc(old('kategori', $potensi['kategori'] ?? 'Kelautan')) ?>" required placeholder="Contoh: Kelautan, Pertanian, UMKM">
            </div>
            <div class="form-group">
                <label class="form-label">Status <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="published" <?= old('status', $potensi['status'] ?? 'published') === 'published' ? 'selected' : '' ?>>Published (Tampilkan)</option>
                    <option value="draft" <?= old('status', $potensi['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft (Simpan sementara)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Lengkap <span style="color: #ef4444;">*</span></label>
            <textarea name="deskripsi" class="form-control" rows="5" required placeholder="Jelaskan potensi desa ini secara detail..."><?= esc(old('deskripsi', $potensi['deskripsi'] ?? '')) ?></textarea>
        </div>

        <div class="form-group" style="padding: 1.25rem; border: 1px dashed var(--border); border-radius: var(--radius-md); background: #f8fafc;">
            <label class="form-label">Foto / Gambar Potensi</label>
            
            <?php if ($isEdit && ! empty($potensi['image'])) : ?>
                <div style="margin-bottom: 1rem;">
                    <img src="<?= base_url(esc($potensi['image'])) ?>" alt="Current foto" style="max-height: 140px; border-radius: 8px; border: 1px solid var(--border);">
                </div>
            <?php endif; ?>

            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp" style="background: #ffffff;">
            <small style="color: #64748b; margin-top: 0.35rem; display: block;">Format JPG, PNG, WEBP. Maks 2MB.</small>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Potensi' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
