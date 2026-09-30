<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = !empty($slider);
$action = $isEdit ? base_url('admin/slider/update/' . $slider['id']) : base_url('admin/slider/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem;">
            <?= esc($title) ?>
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">
            Sesuaikan gambar banner latar belakang beserta teks judul dan subjudul yang muncul di carousel beranda.
        </p>
    </div>
    <a href="<?= base_url('admin/slider') ?>" class="btn-secondary-admin" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; padding: 0.6rem 1rem; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.85rem; font-weight: 600;">
        <i data-lucide="arrow-left" style="width: 16px; height: 16px;"></i>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<div class="card" style="max-width: 900px;">
    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Judul Utama Slide <span style="color: #ef4444;">*</span></label>
                <input type="text" name="title" class="form-control" value="<?= old('title', $slider['title'] ?? '') ?>" placeholder="Contoh: Portal Resmi Desa Batu Bingkung" required>
            </div>

            <div class="form-group">
                <label class="form-label">Badge / Tag Atas</label>
                <input type="text" name="tag" class="form-control" value="<?= old('tag', $slider['tag'] ?? '') ?>" placeholder="Contoh: Kec. Pasimarannu • Kab. Selayar">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Subjudul / Deskripsi Teks Slide</label>
            <textarea name="subtitle" class="form-control" rows="3" placeholder="Masukkan narasi atau penjelasan yang tampil di bawah judul slide..."><?= old('subtitle', $slider['subtitle'] ?? '') ?></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Teks Tombol Aksi (Opsional)</label>
                <input type="text" name="cta_text" class="form-control" value="<?= old('cta_text', $slider['cta_text'] ?? '') ?>" placeholder="Contoh: Jelajahi Profil Desa">
            </div>

            <div class="form-group">
                <label class="form-label">Tautan / Link Tombol (Opsional)</label>
                <input type="text" name="cta_link" class="form-control" value="<?= old('cta_link', $slider['cta_link'] ?? '') ?>" placeholder="Contoh: profil atau https://...">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Nomor Urutan Tampil</label>
                <input type="number" name="urutan" class="form-control" value="<?= old('urutan', $slider['urutan'] ?? 1) ?>" min="1" required>
            </div>

            <div class="form-group">
                <label class="form-label">Status Penayangan <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="aktif" <?= old('status', $slider['status'] ?? 'aktif') === 'aktif' ? 'selected' : '' ?>>Aktif (Ditampilkan di Slider)</option>
                    <option value="nonaktif" <?= old('status', $slider['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif (Disembunyikan)</option>
                </select>
            </div>
        </div>

        <div class="form-group" style="margin-top: 1rem; border-top: 1px solid var(--border); padding-top: 1.25rem;">
            <label class="form-label">
                Foto / Gambar Latar Belakang Slide <?= $isEdit ? '(Biarkan kosong jika tidak ingin mengganti)' : '<span style="color: #ef4444;">*</span>' ?>
            </label>
            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp" <?= $isEdit ? '' : 'required' ?>>
            <small style="color: #64748b; display: block; margin-top: 0.35rem;">
                Format yang diperbolehkan: JPG, PNG, WEBP (Maksimal 5MB). Rekomendasi resolusi: 1920x1080px (Landscape) untuk efek parallax terbaik.
            </small>

            <?php if ($isEdit && !empty($slider['image'])) : ?>
                <div style="margin-top: 1rem;">
                    <span style="font-size: 0.8rem; font-weight: 700; color: #475569; display: block; margin-bottom: 0.5rem;">Gambar Saat Ini:</span>
                    <div style="width: 260px; height: 140px; border-radius: 8px; overflow: hidden; border: 1.5px solid var(--border); background: #0f172a;">
                        <img src="<?= base_url(esc($slider['image'])) ?>" alt="Pratinjau Slide" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 2rem;">
            <a href="<?= base_url('admin/slider') ?>" class="btn-secondary-admin" style="padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.9rem; font-weight: 600;">
                Batal
            </a>
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan Teks &amp; Gambar' : 'Simpan Slide Baru' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
