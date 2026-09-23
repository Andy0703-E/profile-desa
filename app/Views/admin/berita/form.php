<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($berita);
$actionUrl = $isEdit ? base_url('admin/berita/update/' . $berita['id']) : base_url('admin/berita/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/berita') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Berita' : 'Tambah Berita Baru' ?></h2>
    </div>
</div>

<form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; align-items: start;">
        <!-- Left Column: Main Content -->
        <div class="card">
            <div class="form-group">
                <label class="form-label">Judul Berita <span style="color: #ef4444;">*</span></label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $berita['title'] ?? '')) ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label">Kutipan Singkat (Excerpt) <span style="color: #ef4444;">*</span></label>
                <textarea name="excerpt" class="form-control" rows="3" required placeholder="Ringkasan singkat berita untuk ditampilkan di halaman depan..."><?= esc(old('excerpt', $berita['excerpt'] ?? '')) ?></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Isi Konten Berita <span style="color: #ef4444;">*</span></label>
                <!-- Simplified text area instead of complex wysiwyg for robust baseline -->
                <textarea name="content" class="form-control" rows="16" required placeholder="Tuliskan isi berita di sini (Mendukung tag HTML sederhana seperti <p>, <strong>, <ul>)..."><?= esc(old('content', $berita['content'] ?? '')) ?></textarea>
                <small style="color: #64748b; margin-top: 0.4rem; display: block;">Gunakan tag &lt;p&gt; untuk paragraf baru.</small>
            </div>
        </div>

        <!-- Right Column: Settings & Publish -->
        <div>
            <div class="card">
                <h3 class="card-title" style="font-size: 1rem; margin-bottom: 1rem;">Pengaturan Publikasi</h3>

                <div class="form-group">
                    <label class="form-label">Status <span style="color: #ef4444;">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="draft" <?= old('status', $berita['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft (Simpan sementara)</option>
                        <option value="published" <?= old('status', $berita['status'] ?? 'published') === 'published' ? 'selected' : '' ?>>Published (Terbitkan)</option>
                        <option value="archived" <?= old('status', $berita['status'] ?? '') === 'archived' ? 'selected' : '' ?>>Archived (Arsipkan)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $c) : ?>
                            <option value="<?= $c['id'] ?>" <?= old('category_id', $berita['category_id'] ?? '') == $c['id'] ? 'selected' : '' ?>>
                                <?= esc($c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="card">
                <h3 class="card-title" style="font-size: 1rem; margin-bottom: 1rem;">Gambar Utama (Thumbnail)</h3>
                
                <?php if ($isEdit && ! empty($berita['thumbnail'])) : ?>
                    <div style="margin-bottom: 1rem;">
                        <img src="<?= base_url(esc($berita['thumbnail'])) ?>" alt="Current thumbnail" style="width: 100%; height: auto; border-radius: 8px; border: 1px solid var(--border);">
                    </div>
                <?php endif; ?>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Upload Gambar Baru</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/jpeg,image/png,image/webp">
                    <small style="color: #64748b; margin-top: 0.4rem; display: block;">Format JPG, PNG, WEBP. Maksimal 2MB. Dimensi direkomendasikan 800x600px.</small>
                </div>
            </div>

            <button type="submit" class="btn-primary-admin" style="width: 100%; justify-content: center; padding: 0.85rem; font-size: 0.95rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan Berita' : 'Simpan Berita Baru' ?></span>
            </button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
