<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php
$isEdit = isset($aparatur);
$actionUrl = $isEdit ? base_url('admin/pemerintahan/update/' . $aparatur['id']) : base_url('admin/pemerintahan/store');
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/pemerintahan') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;"><?= $isEdit ? 'Edit Data Aparatur' : 'Tambah Aparatur Baru' ?></h2>
    </div>
</div>

<div class="card" style="max-width: 800px;">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color: #ef4444;">*</span></label>
                <input type="text" name="nama" class="form-control" value="<?= esc(old('nama', $aparatur['nama'] ?? '')) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Jabatan (Sesuai SK) <span style="color: #ef4444;">*</span></label>
                <input type="text" name="jabatan" class="form-control" value="<?= esc(old('jabatan', $aparatur['jabatan'] ?? '')) ?>" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Nomor Induk Pegawai (NIP)</label>
                <input type="text" name="nip" class="form-control" value="<?= esc(old('nip', $aparatur['nip'] ?? '-')) ?>" placeholder="Isi '-' jika tidak ada">
            </div>
            <div class="form-group">
                <label class="form-label">Nomor Urut Tampil <span style="color: #ef4444;">*</span></label>
                <input type="number" name="urutan" class="form-control" value="<?= esc(old('urutan', $aparatur['urutan'] ?? '1')) ?>" required min="1">
                <small style="color: #64748b;">Angka yang lebih kecil akan tampil lebih awal (Kades biasanya 1).</small>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status Aparatur <span style="color: #ef4444;">*</span></label>
            <select name="status" class="form-control" required>
                <option value="aktif" <?= old('status', $aparatur['status'] ?? '') === 'aktif' ? 'selected' : '' ?>>Aktif Menjabat</option>
                <option value="tidak_aktif" <?= old('status', $aparatur['status'] ?? '') === 'tidak_aktif' ? 'selected' : '' ?>>Tidak Aktif / Purna Tugas</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Tugas &amp; Fungsi Pokok</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan secara singkat tugas aparatur ini..."><?= esc(old('deskripsi', $aparatur['deskripsi'] ?? '')) ?></textarea>
        </div>

        <div class="form-group" style="padding: 1.25rem; border: 1px dashed var(--border); border-radius: var(--radius-md); background: #f8fafc;">
            <label class="form-label" style="font-size: 0.9rem;">Foto Profil Aparatur</label>
            
            <?php if ($isEdit && ! empty($aparatur['foto'])) : ?>
                <div style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: center;">
                    <img src="<?= base_url(esc($aparatur['foto'])) ?>" alt="Current Foto" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #bbf7d0;">
                    <span style="font-size: 0.85rem; color: #64748b;">Foto saat ini terpasang.</span>
                </div>
            <?php endif; ?>

            <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg" style="background: #ffffff;">
            <small style="color: #64748b; margin-top: 0.4rem; display: block;">Format JPG/PNG. Ukuran rasio 1:1 (persegi) direkomendasikan. Maks 2MB.</small>
        </div>

        <div style="text-align: right; margin-top: 1.5rem;">
            <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem;">
                <i data-lucide="save" style="width: 18px; height: 18px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Aparatur' ?></span>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
