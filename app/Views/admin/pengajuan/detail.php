<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<style>
    .status-pill-big {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .status-diajukan { background: #e0f2fe; color: #0369a1; }
    .status-diperiksa { background: #fef3c7; color: #92400e; }
    .status-diproses { background: #fef08a; color: #854d0e; }
    .status-disetujui { background: #dcfce7; color: #166534; }
    .status-selesai { background: #bbf7d0; color: #14532d; }
    .status-ditolak { background: #fee2e2; color: #991b1b; }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1rem;">
        <a href="<?= base_url('admin/pengajuan') ?>" style="color: #64748b; padding: 0.5rem; border-radius: 8px; background: #ffffff; border: 1px solid var(--border);">
            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
        </a>
        <div>
            <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Pengajuan Tiket: <?= esc($pengajuan['nomor_tiket']) ?></h2>
            <span style="font-size: 0.8rem; color: #64748b;">Masuk pada <?= date('d F Y - H:i', strtotime($pengajuan['created_at'])) ?> WITA</span>
        </div>
    </div>
    <span class="status-pill-big status-<?= esc($pengajuan['status']) ?>">
        <?= esc($pengajuan['status']) ?>
    </span>
</div>

<div style="display: grid; grid-template-columns: 1.6fr 1.2fr; gap: 1.5rem; align-items: start;">
    <!-- Left: Pemohon Detail & Berkas -->
    <div>
        <div class="card">
            <h3 class="card-title" style="margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border);">
                Data Pemohon &amp; Layanan
            </h3>

            <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.9rem;">
                <div>
                    <span style="color: #64748b; font-size: 0.8rem; display: block;">Layanan yang Dimohon:</span>
                    <strong style="color: #15803d; font-size: 1.05rem;"><?= esc($pengajuan['nama_layanan']) ?></strong>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <span style="color: #64748b; font-size: 0.8rem; display: block;">Nama Lengkap:</span>
                        <strong><?= esc($pengajuan['nama_pemohon']) ?></strong>
                    </div>
                    <div>
                        <span style="color: #64748b; font-size: 0.8rem; display: block;">NIK (16 Digit):</span>
                        <span style="font-family: monospace; font-weight: 700;"><?= esc($pengajuan['nik']) ?></span>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <span style="color: #64748b; font-size: 0.8rem; display: block;">Nomor Telepon / WhatsApp:</span>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pengajuan['no_hp']) ?>" target="_blank" style="color: #0284c7; font-weight: 600;">
                            <?= esc($pengajuan['no_hp']) ?>
                        </a>
                    </div>
                    <div>
                        <span style="color: #64748b; font-size: 0.8rem; display: block;">Email:</span>
                        <span><?= esc($pengajuan['email'] ?? '-') ?></span>
                    </div>
                </div>

                <div>
                    <span style="color: #64748b; font-size: 0.8rem; display: block;">Alamat Domisili:</span>
                    <span><?= esc($pengajuan['alamat']) ?></span>
                </div>

                <?php if (! empty($pengajuan['catatan'])) : ?>
                    <div style="background: #f8fafc; padding: 0.85rem; border-radius: 8px; border: 1px solid var(--border);">
                        <span style="color: #64748b; font-size: 0.8rem; display: block; margin-bottom: 0.2rem;">Keperluan / Catatan Pemohon:</span>
                        <span style="font-style: italic; color: #334155;"><?= esc($pengajuan['catatan']) ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <h3 class="card-title" style="margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border);">
                Berkas Dokumen Lampiran
            </h3>

            <?php if (! empty($pengajuan['berkas'])) : ?>
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: var(--radius-md);">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <i data-lucide="file-check" style="width: 28px; height: 28px; color: #15803d;"></i>
                        <div>
                            <strong style="font-size: 0.9rem; color: #14532d; display: block;">Lampiran Berkas Pemohon</strong>
                            <span style="font-size: 0.75rem; color: #64748b;"><?= esc($pengajuan['berkas']) ?></span>
                        </div>
                    </div>
                    <a href="<?= base_url(esc($pengajuan['berkas'])) ?>" target="_blank" class="btn-primary-admin" style="font-size: 0.8rem; padding: 0.45rem 1rem;">
                        <i data-lucide="download" style="width: 14px; height: 14px;"></i>
                        <span>Unduh Berkas</span>
                    </a>
                </div>
            <?php else : ?>
                <div style="text-align: center; color: #64748b; padding: 1.5rem; font-size: 0.875rem;">
                    Pemohon tidak melampirkan berkas secara digital (Membawa berkas fisik langsung ke kantor desa).
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Right: Update Status & Admin Note Form -->
    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1.25rem;">Proses Permohonan</h3>

        <form action="<?= base_url('admin/pengajuan/update-status/' . $pengajuan['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">Status Permohonan <span style="color: #ef4444;">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="diajukan" <?= $pengajuan['status'] === 'diajukan' ? 'selected' : '' ?>>1. Diajukan (Baru masuk)</option>
                    <option value="diperiksa" <?= $pengajuan['status'] === 'diperiksa' ? 'selected' : '' ?>>2. Diperiksa (Kelengkapan berkas dicek)</option>
                    <option value="diproses" <?= $pengajuan['status'] === 'diproses' ? 'selected' : '' ?>>3. Diproses (Surat dibuat / ditandatangani)</option>
                    <option value="disetujui" <?= $pengajuan['status'] === 'disetujui' ? 'selected' : '' ?>>4. Disetujui (Surat siap diambil)</option>
                    <option value="selesai" <?= $pengajuan['status'] === 'selesai' ? 'selected' : '' ?>>5. Selesai (Berkas sudah diterima warga)</option>
                    <option value="ditolak" <?= $pengajuan['status'] === 'ditolak' ? 'selected' : '' ?>>Ditolak (Berkas tidak memenuhi syarat)</option>
                </select>
                <small style="color: #64748b; display: block; margin-top: 0.35rem;">Status ini dapat dilihat oleh pemohon secara real-time via Cek Tiket.</small>
            </div>

            <div class="form-group">
                <label class="form-label">Tanggapan / Instruksi untuk Pemohon</label>
                <textarea name="tanggapan_admin" class="form-control" rows="4" placeholder="Tuliskan catatan petugas, misal: 'Surat telah selesai ditandatangani Kepala Desa, silakan diambil di loket pelayanan kantor desa.'"><?= esc($pengajuan['tanggapan_admin'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="btn-primary-admin" style="width: 100%; justify-content: center; padding: 0.75rem;">
                <i data-lucide="check" style="width: 16px; height: 16px;"></i>
                <span>Simpan Perubahan Status</span>
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
