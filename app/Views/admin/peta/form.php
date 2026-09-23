<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 750px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/peta') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/peta/update/' . $item['id']) : base_url('admin/peta/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Fasilitas / Objek *</label>
                    <input type="text" name="nama" value="<?= esc($item['nama'] ?? '') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori *</label>
                    <select name="kategori" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="kantor" <?= ($item['kategori'] ?? '') === 'kantor' ? 'selected' : '' ?>>Kantor Desa</option>
                        <option value="sekolah" <?= ($item['kategori'] ?? '') === 'sekolah' ? 'selected' : '' ?>>Sekolah</option>
                        <option value="masjid" <?= ($item['kategori'] ?? '') === 'masjid' ? 'selected' : '' ?>>Masjid / Ibadah</option>
                        <option value="posyandu" <?= ($item['kategori'] ?? '') === 'posyandu' ? 'selected' : '' ?>>Posyandu / Faskes</option>
                        <option value="infrastruktur" <?= ($item['kategori'] ?? '') === 'infrastruktur' ? 'selected' : '' ?>>Infrastruktur / Dermaga</option>
                        <option value="umkm" <?= ($item['kategori'] ?? '') === 'umkm' ? 'selected' : '' ?>>Sentra UMKM / BUMDes</option>
                        <option value="wisata" <?= ($item['kategori'] ?? '') === 'wisata' ? 'selected' : '' ?>>Objek Wisata</option>
                        <option value="pembangunan" <?= ($item['kategori'] ?? '') === 'pembangunan' ? 'selected' : '' ?>>Titik Proyek</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Latitude (Garis Lintang) *</label>
                    <input type="text" name="lat" value="<?= esc($item['lat'] ?? '-7.3683708') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none; font-family: monospace;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Longitude (Garis Bujur) *</label>
                    <input type="text" name="lng" value="<?= esc($item['lng'] ?? '121.1260432') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none; font-family: monospace;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Alamat Lengkap</label>
                <input type="text" name="alamat" value="<?= esc($item['alamat'] ?? '') ?>" 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Deskripsi Singkat Objek</label>
                <textarea name="deskripsi" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['deskripsi'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Titik Peta
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
