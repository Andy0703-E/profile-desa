<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($pengumuman);
$actionUrl = $isEdit ? base_url('admin/pengumuman/update/' . $pengumuman['id']) : base_url('admin/pengumuman/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/pengumuman') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Pengumuman' : 'Tambah Pengumuman Baru' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <form action="<?= $actionUrl ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Judul Pengumuman <span style="color: #ef4444;">*</span></label>
            <input type="text" name="judul" class="form-control" value="<?= esc(old('judul', $pengumuman['judul'] ?? '')) ?>" required placeholder="Contoh: Himbauan Kewaspadaan Cuaca Nelayan">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Tanggal <span style="color: #ef4444;">*</span></label>
                <input type="date" name="tanggal" class="form-control" value="<?= esc(old('tanggal', $pengumuman['tanggal'] ?? date('Y-m-d'))) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Prioritas <span style="color: #ef4444;">*</span></label>
                <select name="prioritas" class="form-control" required>
                    <option value="biasa" <?= old('prioritas', $pengumuman['prioritas'] ?? '') === 'biasa' ? 'selected' : '' ?>>Biasa (Info umum)</option>
                    <option value="penting" <?= old('prioritas', $pengumuman['prioritas'] ?? '') === 'penting' ? 'selected' : '' ?>>Penting (Perhatian warga)</option>
                    <option value="mendesak" <?= old('prioritas', $pengumuman['prioritas'] ?? '') === 'mendesak' ? 'selected' : '' ?>>Mendesak (Darurat/segera)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Status <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="aktif" <?= old('status', $pengumuman['status'] ?? '') === 'aktif' ? 'selected' : '' ?>>Aktif (Tampilkan)</option>
                    <option value="nonaktif" <?= old('status', $pengumuman['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif (Arsip)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Isi Pengumuman <span style="color: #ef4444;">*</span></label>
            <textarea name="isi" class="form-control" rows="5" required placeholder="Tuliskan isi teks pengumuman resmi..."><?= esc(old('isi', $pengumuman['isi'] ?? '')) ?></textarea>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Terbitkan Pengumuman' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
