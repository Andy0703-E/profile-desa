<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($layanan);
$actionUrl = $isEdit ? base_url('admin/layanan/update/' . $layanan['id']) : base_url('admin/layanan/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/layanan') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Layanan' : 'Tambah Layanan Baru' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <form action="<?= $actionUrl ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label class="form-label">Nama Layanan / Surat Keterangan <span style="color: #ef4444;">*</span></label>
            <input type="text" name="nama_layanan" class="form-control" value="<?= esc(old('nama_layanan', $layanan['nama_layanan'] ?? '')) ?>" required placeholder="Contoh: Surat Keterangan Domisili">
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Layanan <span style="color: #ef4444;">*</span></label>
            <textarea name="deskripsi" class="form-control" rows="3" required placeholder="Jelaskan kegunaan layanan ini..."><?= esc(old('deskripsi', $layanan['deskripsi'] ?? '')) ?></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Estimasi Waktu Proses <span style="color: #ef4444;">*</span></label>
                <input type="text" name="estimasi_waktu" class="form-control" value="<?= esc(old('estimasi_waktu', $layanan['estimasi_waktu'] ?? '1 Hari Kerja')) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Biaya / Tarif <span style="color: #ef4444;">*</span></label>
                <input type="text" name="biaya" class="form-control" value="<?= esc(old('biaya', $layanan['biaya'] ?? 'Gratis')) ?>" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Penanggung Jawab / Kasi <span style="color: #ef4444;">*</span></label>
                <input type="text" name="penanggung_jawab" class="form-control" value="<?= esc(old('penanggung_jawab', $layanan['penanggung_jawab'] ?? 'Kasi Pelayanan')) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Icon (Lucide) <span style="color: #ef4444;">*</span></label>
                <input type="text" name="icon" class="form-control" value="<?= esc(old('icon', $layanan['icon'] ?? 'file-text')) ?>" required placeholder="file-text">
                <small style="color: #64748b; margin-top: 0.2rem; display: block;"><a href="https://lucide.dev/icons/" target="_blank" style="color: #0284c7;">Lihat daftar icon Lucide</a></small>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Status Layanan <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="aktif" <?= old('status', $layanan['status'] ?? '') === 'aktif' ? 'selected' : '' ?>>Aktif (Tampil di publik)</option>
                    <option value="nonaktif" <?= old('status', $layanan['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif (Sembunyikan)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Nomor Urut Tampil <span style="color: #ef4444;">*</span></label>
                <input type="number" name="urutan" class="form-control" value="<?= esc(old('urutan', $layanan['urutan'] ?? '1')) ?>" required min="1">
            </div>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Simpan Layanan Baru' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
