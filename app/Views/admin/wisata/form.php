<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 750px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/wisata') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/wisata/update/' . $item['id']) : base_url('admin/wisata/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Objek Wisata *</label>
                    <input type="text" name="nama" value="<?= esc($item['nama'] ?? '') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori *</label>
                    <input type="text" name="kategori" value="<?= esc($item['kategori'] ?? 'Wisata Bahari') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Harga Tiket</label>
                    <input type="text" name="harga_tiket" value="<?= esc($item['harga_tiket'] ?? 'Gratis') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Jam Buka / Operasional</label>
                    <input type="text" name="jam_buka" value="<?= esc($item['jam_buka'] ?? 'Setiap Hari 06.00 - 18.00 WITA') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kontak Pengelola / Pokdarwis</label>
                    <input type="text" name="kontak_pengelola" value="<?= esc($item['kontak_pengelola'] ?? '') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Foto Wisata</label>
                    <input type="file" name="foto" accept="image/*" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Fasilitas Wisata</label>
                <input type="text" name="fasilitas" value="<?= esc($item['fasilitas'] ?? 'Gazebo, toilet, warung makan, parkir') ?>" 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Link Google Maps</label>
                <input type="text" name="maps_url" value="<?= esc($item['maps_url'] ?? '') ?>" placeholder="https://maps.google.com/..." 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Deskripsi & Daya Tarik Wisata</label>
                <textarea name="deskripsi" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['deskripsi'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Data Wisata
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
