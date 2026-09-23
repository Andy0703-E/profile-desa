<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 850px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/pembangunan') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/pembangunan/update/' . $item['id']) : base_url('admin/pembangunan/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Kegiatan Pembangunan *</label>
                <input type="text" name="nama_kegiatan" value="<?= esc($item['nama_kegiatan'] ?? '') ?>" required 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Bidang Kegiatan *</label>
                    <input type="text" name="bidang" value="<?= esc($item['bidang'] ?? 'Bidang Pelaksanaan Pembangunan Desa') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Dusun Wilayah *</label>
                    <select name="dusun" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="Dusun Pesisir" <?= ($item['dusun'] ?? '') === 'Dusun Pesisir' ? 'selected' : '' ?>>Dusun Pesisir</option>
                        <option value="Dusun Darat Makmur" <?= ($item['dusun'] ?? '') === 'Dusun Darat Makmur' ? 'selected' : '' ?>>Dusun Darat Makmur</option>
                        <option value="Dusun Karangan Timur" <?= ($item['dusun'] ?? '') === 'Dusun Karangan Timur' ? 'selected' : '' ?>>Dusun Karangan Timur</option>
                        <option value="Dusun Bone Tanjung" <?= ($item['dusun'] ?? '') === 'Dusun Bone Tanjung' ? 'selected' : '' ?>>Dusun Bone Tanjung</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Pagu Anggaran (Rp) *</label>
                    <input type="text" name="anggaran" value="<?= $item['anggaran'] ?? 0 ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tahun *</label>
                    <input type="number" name="tahun" value="<?= $item['tahun'] ?? date('Y') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Status *</label>
                    <select name="status" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="berjalan" <?= ($item['status'] ?? '') === 'berjalan' ? 'selected' : '' ?>>Berjalan</option>
                        <option value="selesai" <?= ($item['status'] ?? '') === 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="direncanakan" <?= ($item['status'] ?? '') === 'direncanakan' ? 'selected' : '' ?>>Direncanakan</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Sumber Dana</label>
                    <input type="text" name="sumber_dana" value="<?= esc($item['sumber_dana'] ?? 'Dana Desa (DDS)') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Persentase Progres (%)</label>
                    <input type="number" min="0" max="100" name="progres" value="<?= $item['progres'] ?? 0 ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Volume Kegiatan</label>
                    <input type="text" name="volume" value="<?= esc($item['volume'] ?? '') ?>" placeholder="Contoh: 450 m x 2,5 m"
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Pelaksana Kegiatan</label>
                    <input type="text" name="pelaksana" value="<?= esc($item['pelaksana'] ?? 'TPK Desa Batu Bingkung') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Latitude GPS</label>
                    <input type="text" name="lat" value="<?= esc($item['lat'] ?? '-7.3683708') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none; font-family: monospace;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Longitude GPS</label>
                    <input type="text" name="lng" value="<?= esc($item['lng'] ?? '121.1260432') ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none; font-family: monospace;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Foto Kondisi Sebelum</label>
                    <input type="file" name="foto_sebelum" accept="image/*" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Foto Realisasi / Terkini</label>
                    <input type="file" name="foto_sesudah" accept="image/*" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Manfaat Proyek Bagi Warga</label>
                <textarea name="manfaat" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['manfaat'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Data Pembangunan
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
