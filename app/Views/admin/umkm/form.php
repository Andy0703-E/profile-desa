<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 750px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/umkm') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/umkm/update/' . $item['id']) : base_url('admin/umkm/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Usaha / Produk *</label>
                    <input type="text" name="nama_usaha" value="<?= esc($item['nama_usaha'] ?? '') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori *</label>
                    <input type="text" name="kategori" value="<?= esc($item['kategori'] ?? 'Kuliner') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Pemilik *</label>
                    <input type="text" name="nama_pemilik" value="<?= esc($item['nama_pemilik'] ?? '') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Harga / Kisaran</label>
                    <input type="text" name="harga" value="<?= esc($item['harga'] ?? 'Rp 15.000') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">No. WhatsApp *</label>
                    <input type="text" name="whatsapp" value="<?= esc($item['whatsapp'] ?? '6282194882000') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Wilayah Dusun</label>
                    <select name="dusun" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="Dusun Pesisir" <?= ($item['dusun'] ?? '') === 'Dusun Pesisir' ? 'selected' : '' ?>>Dusun Pesisir</option>
                        <option value="Dusun Darat Makmur" <?= ($item['dusun'] ?? '') === 'Dusun Darat Makmur' ? 'selected' : '' ?>>Dusun Darat Makmur</option>
                        <option value="Dusun Karangan Timur" <?= ($item['dusun'] ?? '') === 'Dusun Karangan Timur' ? 'selected' : '' ?>>Dusun Karangan Timur</option>
                        <option value="Dusun Bone Tanjung" <?= ($item['dusun'] ?? '') === 'Dusun Bone Tanjung' ? 'selected' : '' ?>>Dusun Bone Tanjung</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Foto Produk</label>
                    <input type="file" name="foto" accept="image/*" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
                </div>
            </div>

            <div style="display: flex; gap: 1.5rem; margin-bottom: 1rem;">
                <label style="display: flex; align-items: center; gap: 0.4rem; font-size: 0.85rem; font-weight: 600; color: #334155; cursor: pointer;">
                    <input type="checkbox" name="is_unggulan" value="1" <?= !empty($item['is_unggulan']) ? 'checked' : '' ?>>
                    Tandai sebagai Produk Unggulan
                </label>
                <label style="display: flex; align-items: center; gap: 0.4rem; font-size: 0.85rem; font-weight: 600; color: #334155; cursor: pointer;">
                    <input type="checkbox" name="is_bumdes" value="1" <?= !empty($item['is_bumdes']) ? 'checked' : '' ?>>
                    Usaha Kelolaan BUMDes
                </label>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Deskripsi Produk / Usaha</label>
                <textarea name="deskripsi" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['deskripsi'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Produk UMKM
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
