<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($galeri);
$actionUrl = $isEdit ? base_url('admin/galeri/update/' . $galeri['id']) : base_url('admin/galeri/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/galeri') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Foto Galeri' : 'Tambah Foto Galeri' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 750px;">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Judul Foto / Kegiatan <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" class="form-control" value="<?= esc(old('title', $galeri['title'] ?? '')) ?>" required placeholder="Contoh: Kegiatan Musrenbang Desa">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($categories as $c) : ?>
                        <option value="<?= $c['id'] ?>" <?= old('category_id', $galeri['category_id'] ?? '') == $c['id'] ? 'selected' : '' ?>>
                            <?= esc($c['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Status <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="published" <?= old('status', $galeri['status'] ?? 'published') === 'published' ? 'selected' : '' ?>>Published (Tampilkan)</option>
                    <option value="draft" <?= old('status', $galeri['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft (Simpan sementara)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Keterangan Singkat</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi foto..."><?= esc(old('description', $galeri['description'] ?? '')) ?></textarea>
        </div>

        <div class="form-group" style="padding: 1.25rem; border: 1px dashed var(--border); border-radius: var(--radius-md); background: #f8fafc;">
            <label class="form-label">File Gambar <span style="color: #ef4444;"><?= $isEdit ? '' : '*' ?></span></label>
            
            <?php if ($isEdit && ! empty($galeri['image'])) : ?>
                <div style="margin-bottom: 1rem;">
                    <img src="<?= base_url(esc($galeri['image'])) ?>" alt="Current foto" style="max-height: 150px; border-radius: 8px; border: 1px solid var(--border);">
                </div>
            <?php endif; ?>

            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp" <?= $isEdit ? '' : 'required' ?> style="background: #ffffff;">
            <small style="color: #64748b; margin-top: 0.35rem; display: block;">Format JPG, PNG, WEBP. Maks 3MB.</small>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Upload Foto' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
