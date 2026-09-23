<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/apbdes') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/apbdes/update/' . $item['id']) : base_url('admin/apbdes/store') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tahun Anggaran *</label>
                    <input type="number" name="tahun" value="<?= $item['tahun'] ?? date('Y') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Jenis Anggaran *</label>
                    <select name="jenis" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="murni" <?= ($item['jenis'] ?? '') === 'murni' ? 'selected' : '' ?>>APBDes Murni</option>
                        <option value="perubahan" <?= ($item['jenis'] ?? '') === 'perubahan' ? 'selected' : '' ?>>APBDes Perubahan</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Judul APBDes *</label>
                <input type="text" name="judul" value="<?= esc($item['judul'] ?? 'APBDes Tahun Anggaran ' . date('Y')) ?>" required 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <!-- Angka Pendapatan -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; background: #f8fafc; padding: 1rem; border-radius: 8px;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #059669; margin-bottom: 0.35rem;">Total Pendapatan (Rp) *</label>
                    <input type="text" name="total_pendapatan" value="<?= $item['total_pendapatan'] ?? 0 ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #059669; margin-bottom: 0.35rem;">Realisasi Pendapatan (Rp)</label>
                    <input type="text" name="realisasi_pendapatan" value="<?= $item['realisasi_pendapatan'] ?? 0 ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <!-- Angka Belanja -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; background: #f8fafc; padding: 1rem; border-radius: 8px;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #d97706; margin-bottom: 0.35rem;">Total Belanja (Rp) *</label>
                    <input type="text" name="total_belanja" value="<?= $item['total_belanja'] ?? 0 ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #d97706; margin-bottom: 0.35rem;">Realisasi Belanja (Rp)</label>
                    <input type="text" name="realisasi_belanja" value="<?= $item['realisasi_belanja'] ?? 0 ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <!-- Angka Pembiayaan -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; background: #f8fafc; padding: 1rem; border-radius: 8px;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #2563eb; margin-bottom: 0.35rem;">Total Pembiayaan (Rp)</label>
                    <input type="text" name="total_pembiayaan" value="<?= $item['total_pembiayaan'] ?? 0 ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #2563eb; margin-bottom: 0.35rem;">Realisasi Pembiayaan (Rp)</label>
                    <input type="text" name="realisasi_pembiayaan" value="<?= $item['realisasi_pembiayaan'] ?? 0 ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Upload File Salinan PDF</label>
                <input type="file" name="file_pdf" accept="application/pdf" style="width: 100%; padding: 0.5rem; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.82rem;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Keterangan & Catatan Singkat</label>
                <textarea name="keterangan" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['keterangan'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan APBDes
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
