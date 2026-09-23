<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.35rem;">
            <a href="<?= base_url('admin/apbdes') ?>" style="color: #64748b; text-decoration: none; font-size: 0.85rem;">&larr; Kembali</a>
            <span style="color: #cbd5e1;">/</span>
            <span style="color: #0b6045; font-weight: 700; font-size: 0.85rem;">TA <?= esc($apbdes['tahun']) ?></span>
        </div>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($apbdes['judul']) ?></h1>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 0.85rem 1rem; border-radius: 6px; margin-bottom: 1.5rem; color: #065f46; font-size: 0.88rem;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; align-items: flex-start;">
    <!-- Kolom Kiri: Tabel Rincian Rekening -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <div style="padding: 1rem 1.25rem; border-bottom: 1px solid #e2e8f0; font-weight: 700; color: #0f172a;">
            Daftar Item Rincian APBDes
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem; text-align: left;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                        <th style="padding: 0.75rem 1rem;">Tipe</th>
                        <th style="padding: 0.75rem 1rem;">Kode</th>
                        <th style="padding: 0.75rem 1rem;">Uraian</th>
                        <th style="padding: 0.75rem 1rem; text-align: right;">Anggaran</th>
                        <th style="padding: 0.75rem 1rem; text-align: right;">Realisasi</th>
                        <th style="padding: 0.75rem 1rem; text-align: center;">%</th>
                        <th style="padding: 0.75rem 1rem; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rincian)): ?>
                        <tr><td colspan="7" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada item rekening rincian. Silakan tambahkan pada form di samping.</td></tr>
                    <?php else: ?>
                        <?php foreach ($rincian as $r): ?>
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 0.75rem 1rem;">
                                    <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; padding: 0.15rem 0.4rem; border-radius: 4px; <?= $r['tipe'] === 'pendapatan' ? 'background: #ecfdf5; color: #059669;' : ($r['tipe'] === 'belanja' ? 'background: #fef3c7; color: #d97706;' : 'background: #eff6ff; color: #2563eb;') ?>">
                                        <?= esc($r['tipe']) ?>
                                    </span>
                                </td>
                                <td style="padding: 0.75rem 1rem; font-family: monospace; color: #64748b;"><?= esc($r['kode_rekening']) ?></td>
                                <td style="padding: 0.75rem 1rem; font-weight: 600; color: #1e293b;"><?= esc($r['uraian']) ?></td>
                                <td style="padding: 0.75rem 1rem; text-align: right;"><?= number_format($r['anggaran'], 0, ',', '.') ?></td>
                                <td style="padding: 0.75rem 1rem; text-align: right; font-weight: 600;"><?= number_format($r['realisasi'], 0, ',', '.') ?></td>
                                <td style="padding: 0.75rem 1rem; text-align: center; font-weight: 700;"><?= $r['persentase'] ?>%</td>
                                <td style="padding: 0.75rem 1rem; text-align: center;">
                                    <form method="post" action="<?= base_url('admin/apbdes/delete-rincian/' . $r['id']) ?>" onsubmit="return confirm('Hapus item ini?');" style="display: inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" style="padding: 0.25rem 0.5rem; background: #fee2e2; color: #ef4444; border: none; border-radius: 4px; font-size: 0.72rem; font-weight: 700; cursor: pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Kolom Kanan: Form Tambah Item Rekening -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <h3 style="font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem;">Tambah Item Rekening</h3>
        
        <form method="post" action="<?= base_url('admin/apbdes/store-rincian/' . $apbdes['id']) ?>">
            <?= csrf_field() ?>

            <div style="margin-bottom: 0.85rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 0.3rem;">Kelompok Rekening *</label>
                <select name="tipe" required style="width: 100%; padding: 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; background: #fff; outline: none;">
                    <option value="pendapatan">1. Pendapatan Desa</option>
                    <option value="belanja">2. Belanja Desa</option>
                    <option value="pembiayaan">3. Pembiayaan Desa</option>
                </select>
            </div>

            <div style="margin-bottom: 0.85rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 0.3rem;">Kode Rekening</label>
                <input type="text" name="kode_rekening" placeholder="Contoh: 4.2.1 atau 5.1" 
                       style="width: 100%; padding: 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none;">
            </div>

            <div style="margin-bottom: 0.85rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 0.3rem;">Uraian Pos / Kegiatan *</label>
                <input type="text" name="uraian" required placeholder="Contoh: Dana Desa (DDS)" 
                       style="width: 100%; padding: 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none;">
            </div>

            <div style="margin-bottom: 0.85rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 0.3rem;">Pagu Anggaran (Rp) *</label>
                <input type="text" name="anggaran" required placeholder="0" 
                       style="width: 100%; padding: 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none;">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #334155; margin-bottom: 0.3rem;">Realisasi Saat Ini (Rp)</label>
                <input type="text" name="realisasi" placeholder="0" 
                       style="width: 100%; padding: 0.6rem; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 0.85rem; outline: none;">
            </div>

            <button type="submit" style="width: 100%; padding: 0.7rem; border-radius: 6px; background: #0b6045; color: #fff; font-weight: 700; font-size: 0.85rem; border: none; cursor: pointer;">
                + Tambah Item Rekening
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
