<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 750px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/dokumen') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/dokumen/update/' . $item['id']) : base_url('admin/dokumen/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Judul Dokumen *</label>
                <input type="text" name="judul" value="<?= esc($item['judul'] ?? '') ?>" required 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nomor Dokumen</label>
                    <input type="text" name="nomor_dokumen" value="<?= esc($item['nomor_dokumen'] ?? '') ?>" placeholder="PERDES/01/2026"
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori *</label>
                    <select name="kategori" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="perdes" <?= ($item['kategori'] ?? '') === 'perdes' ? 'selected' : '' ?>>Peraturan Desa</option>
                        <option value="sk_kades" <?= ($item['kategori'] ?? '') === 'sk_kades' ? 'selected' : '' ?>>SK Kepala Desa</option>
                        <option value="rpjmdes" <?= ($item['kategori'] ?? '') === 'rpjmdes' ? 'selected' : '' ?>>RPJMDes</option>
                        <option value="rkpdes" <?= ($item['kategori'] ?? '') === 'rkpdes' ? 'selected' : '' ?>>RKPDes</option>
                        <option value="apbdes" <?= ($item['kategori'] ?? '') === 'apbdes' ? 'selected' : '' ?>>APBDes</option>
                        <option value="lpj" <?= ($item['kategori'] ?? '') === 'lpj' ? 'selected' : '' ?>>LPJ Realisasi</option>
                        <option value="lainnya" <?= ($item['kategori'] ?? '') === 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tahun *</label>
                    <input type="number" name="tahun" value="<?= $item['tahun'] ?? date('Y') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">File Dokumen PDF</label>
                <input type="file" name="file_dokumen" accept="application/pdf" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Ringkasan / Keterangan Dokumen</label>
                <textarea name="deskripsi" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['deskripsi'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Dokumen
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
