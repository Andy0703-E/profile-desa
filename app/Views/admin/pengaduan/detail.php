<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/pengaduan') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 0.85rem 1rem; border-radius: 6px; margin-bottom: 1.5rem; color: #065f46; font-size: 0.88rem;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Detail Laporan Warga -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 1.75rem; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
            <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                    <?= esc($item['kategori']) ?> &bull; <?= esc($item['dusun']) ?>
                </span>
                <h2 style="font-size: 1.3rem; font-weight: 800; color: #0f172a; margin-top: 0.2rem;"><?= esc($item['judul']) ?></h2>
            </div>
            <span style="padding: 0.35rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; 
                <?= $item['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : ($item['status'] === 'diproses' ? 'background: #eff6ff; color: #2563eb;' : 'background: #fef3c7; color: #d97706;') ?>">
                Status: <?= esc($item['status']) ?>
            </span>
        </div>

        <div style="background: #f8fafc; border-radius: 8px; padding: 1rem; font-size: 0.9rem; color: #334155; line-height: 1.6; margin-bottom: 1rem;">
            <?= nl2br(esc($item['isi_aduan'])) ?>
        </div>

        <?php if (!empty($item['foto_bukti'])): ?>
            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.78rem; font-weight: 700; color: #64748b; margin-bottom: 0.3rem;">Lampiran Foto Bukti:</label>
                <a href="<?= base_url($item['foto_bukti']) ?>" target="_blank">
                    <img src="<?= base_url($item['foto_bukti']) ?>" style="max-height: 180px; border-radius: 8px; border: 1px solid #e2e8f0;">
                </a>
            </div>
        <?php endif; ?>

        <div style="font-size: 0.8rem; color: #64748b; border-top: 1px solid #f1f5f9; padding-top: 0.75rem; display: flex; gap: 1.5rem; flex-wrap: wrap;">
            <div>Pelapor: <strong style="color: #1e293b;"><?= esc($item['nama_pelapor']) ?></strong></div>
            <div>No. WhatsApp: <strong style="color: #1e293b;"><?= esc($item['no_hp']) ?></strong></div>
            <div>Waktu: <?= date('d M Y, H:i', strtotime($item['created_at'])) ?> WITA</div>
        </div>
    </div>

    <!-- Form Tanggapan Admin -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 1.75rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem;">Tindak Lanjut & Tanggapan Pemerintah Desa</h3>

        <form method="post" action="<?= base_url('admin/pengaduan/tanggapi/' . $item['id']) ?>">
            <?= csrf_field() ?>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Update Status Pengaduan *</label>
                <select name="status" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                    <option value="diajukan" <?= $item['status'] === 'diajukan' ? 'selected' : '' ?>>Diajukan (Menunggu Pemeriksaan)</option>
                    <option value="diverifikasi" <?= $item['status'] === 'diverifikasi' ? 'selected' : '' ?>>Diverifikasi</option>
                    <option value="diproses" <?= $item['status'] === 'diproses' ? 'selected' : '' ?>>Diproses (Sedang Ditindaklanjuti)</option>
                    <option value="selesai" <?= $item['status'] === 'selesai' ? 'selected' : '' ?>>Selesai (Tuntas Ditangani)</option>
                    <option value="ditolak" <?= $item['status'] === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Isi Tanggapan Resmi Pemerintah Desa *</label>
                <textarea name="tanggapan" rows="4" required placeholder="Tuliskan keterangan perbaikan, peninjauan lapangan, atau solusi resmi..." 
                          style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['tanggapan'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Tanggapan Resmi
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
