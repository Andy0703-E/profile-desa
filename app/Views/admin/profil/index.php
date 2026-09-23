<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<form action="<?= base_url('admin/profil/update') ?>" method="post">
    <?= csrf_field() ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Pengaturan Profil &amp; Identitas Desa</h2>
        <button type="submit" class="btn-primary-admin">
            <i data-lucide="save" style="width: 16px; height: 16px;"></i>
            <span>Simpan Perubahan</span>
        </button>
    </div>

    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1.25rem; border-bottom: 1px solid var(--border); padding-bottom: 0.75rem;">1. Identitas Dasar</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Nama Desa</label>
                <input type="text" name="nama_desa" class="form-control" value="<?= esc($desa['nama_desa'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Slogan Desa</label>
                <input type="text" name="slogan" class="form-control" value="<?= esc($desa['slogan'] ?? '') ?>" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Motto</label>
                <input type="text" name="motto" class="form-control" value="<?= esc($desa['motto'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Luas Wilayah</label>
                <input type="text" name="luas_wilayah" class="form-control" value="<?= esc($desa['luas_wilayah'] ?? '') ?>">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Jumlah Penduduk (Jiwa)</label>
                <input type="number" name="jumlah_penduduk" class="form-control" value="<?= esc($desa['jumlah_penduduk'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Jumlah Kepala Keluarga (KK)</label>
                <input type="number" name="jumlah_kk" class="form-control" value="<?= esc($desa['jumlah_kk'] ?? '') ?>" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Deskripsi Singkat (Ditampilkan di Homepage)</label>
            <textarea name="deskripsi" class="form-control" rows="3"><?= esc($desa['deskripsi'] ?? '') ?></textarea>
        </div>
    </div>

    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1.25rem; border-bottom: 1px solid var(--border); padding-bottom: 0.75rem;">2. Kontak &amp; Pelayanan</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Telepon / WhatsApp Layanan</label>
                <input type="text" name="telepon" class="form-control" value="<?= esc($desa['telepon'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Email Resmi Desa</label>
                <input type="email" name="email" class="form-control" value="<?= esc($desa['email'] ?? '') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Jam Pelayanan Kantor</label>
            <input type="text" name="jam_pelayanan" class="form-control" value="<?= esc($desa['jam_pelayanan'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Alamat Kantor Desa Lengkap</label>
            <textarea name="alamat" class="form-control" rows="2"><?= esc($desa['alamat'] ?? '') ?></textarea>
        </div>
    </div>

    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1.25rem; border-bottom: 1px solid var(--border); padding-bottom: 0.75rem;">3. Visi &amp; Misi Desa</h3>
        
        <div class="form-group">
            <label class="form-label">Visi Desa</label>
            <textarea name="visi" class="form-control" rows="3"><?= esc($profil['visi'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Misi Desa</label>
            <textarea name="misi" class="form-control" rows="6"><?= esc($profil['misi'] ?? '') ?></textarea>
            <small style="color: #64748b;">Gunakan nomor untuk setiap poin misi.</small>
        </div>
    </div>

    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1.25rem; border-bottom: 1px solid var(--border); padding-bottom: 0.75rem;">4. Data Pendukung Lainnya</h3>
        
        <div class="form-group">
            <label class="form-label">Sejarah Desa</label>
            <textarea name="sejarah" class="form-control" rows="5"><?= esc($profil['sejarah'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Kondisi Geografis</label>
            <textarea name="geografis" class="form-control" rows="4"><?= esc($profil['geografis'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Kondisi Demografis</label>
            <textarea name="demografis" class="form-control" rows="4"><?= esc($profil['demografis'] ?? '') ?></textarea>
        </div>

        <h4 style="font-size: 0.95rem; font-weight: 600; color: #334155; margin: 1.5rem 0 1rem;">Batas Wilayah</h4>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Batas Utara</label>
                <input type="text" name="batas_utara" class="form-control" value="<?= esc($profil['batas_utara'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Batas Selatan</label>
                <input type="text" name="batas_selatan" class="form-control" value="<?= esc($profil['batas_selatan'] ?? '') ?>">
            </div>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Batas Timur</label>
                <input type="text" name="batas_timur" class="form-control" value="<?= esc($profil['batas_timur'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Batas Barat</label>
                <input type="text" name="batas_barat" class="form-control" value="<?= esc($profil['batas_barat'] ?? '') ?>">
            </div>
        </div>
    </div>

    <div style="text-align: right; margin-bottom: 2rem;">
        <button type="submit" class="btn-primary-admin" style="padding: 0.75rem 2rem; font-size: 1rem;">
            <i data-lucide="save" style="width: 18px; height: 18px;"></i>
            <span>Simpan Semua Perubahan</span>
        </button>
    </div>
</form>

<?= $this->endSection() ?>
