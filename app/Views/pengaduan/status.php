<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <a href="<?= base_url('pengaduan') ?>" style="color: inherit; text-decoration: none;">Pengaduan</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Status Tiket</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Tracking Status Pengaduan</h1>
        <p style="color: #d1fae5; font-size: 0.95rem;">Nomor Tiket: <strong style="font-family: monospace;"><?= esc($tiket) ?></strong></p>
    </div>
</section>

<div class="container" style="padding-top: 2.5rem; padding-bottom: 4rem; max-width: 800px;">
    <?php if ($laporan): ?>
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.5rem;">
                <div>
                    <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase;">Kode Tiket</span>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: #0b6045; font-family: monospace;"><?= esc($laporan['kode_tiket']) ?></h3>
                </div>
                <div>
                    <span style="display: inline-block; padding: 0.4rem 0.9rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; 
                        <?= $laporan['status'] === 'selesai' ? 'background: #ecfdf5; color: #059669;' : ($laporan['status'] === 'diproses' ? 'background: #eff6ff; color: #2563eb;' : 'background: #fef3c7; color: #d97706;') ?>">
                        Status: <?= ucfirst($laporan['status']) ?>
                    </span>
                </div>
            </div>

            <!-- Detail Laporan -->
            <div style="margin-bottom: 1.5rem;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;"><?= esc($laporan['kategori']) ?> &bull; <?= esc($laporan['dusun']) ?></span>
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0.25rem 0 0.75rem;"><?= esc($laporan['judul']) ?></h2>
                <p style="font-size: 0.92rem; color: #334155; line-height: 1.6; background: #f8fafc; padding: 1rem; border-radius: 8px;">
                    <?= nl2br(esc($laporan['isi_aduan'])) ?>
                </p>
                <div style="font-size: 0.78rem; color: #94a3b8; margin-top: 0.5rem;">
                    Dilaporkan oleh: <?= esc($laporan['nama_pelapor']) ?> pada <?= date('d M Y, H:i', strtotime($laporan['created_at'])) ?> WITA
                </div>
            </div>

            <!-- Tanggapan Resmi Pemerintah Desa -->
            <div style="border-top: 1px solid #e2e8f0; padding-top: 1.5rem; margin-top: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #0b6045; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.75rem;">
                        <i data-lucide="check" style="width: 16px; height: 16px;"></i>
                    </div>
                    <h4 style="font-size: 1rem; font-weight: 700; color: #0f172a;">Tindak Lanjut & Tanggapan Pemerintah Desa</h4>
                </div>

                <?php if (!empty($laporan['tanggapan'])): ?>
                    <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 1.25rem; border-radius: 8px;">
                        <p style="font-size: 0.92rem; color: #065f46; line-height: 1.6; margin-bottom: 0.5rem;">
                            <?= nl2br(esc($laporan['tanggapan'])) ?>
                        </p>
                        <small style="color: #047857; font-size: 0.78rem; font-weight: 600;">
                            Ditanggapi pada: <?= date('d M Y, H:i', strtotime($laporan['tanggal_tanggapan'])) ?> WITA
                        </small>
                    </div>
                <?php else: ?>
                    <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1rem 1.25rem; border-radius: 8px; color: #92400e; font-size: 0.88rem;">
                        Pengaduan Anda telah masuk antrean dan sedang dalam tahap verifikasi/pemeriksaan oleh perangkat desa terkait.
                    </div>
                <?php endif; ?>
            </div>

            <div style="margin-top: 2rem;">
                <a href="<?= base_url('pengaduan') ?>" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.6rem 1.25rem; border-radius: 8px; background: #f1f5f9; color: #475569; font-weight: 600; font-size: 0.85rem; text-decoration: none;">
                    &larr; Buat Pengaduan Lainnya
                </a>
            </div>
        </div>
    <?php else: ?>
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
            <i data-lucide="alert-circle" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #ef4444;"></i>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Nomor Tiket Tidak Ditemukan</h3>
            <p>Pastikan kode tiket yang Anda masukkan benar sesuai bukti pengajuan.</p>
            <div style="margin-top: 1.5rem;">
                <a href="<?= base_url('pengaduan') ?>" style="display: inline-block; padding: 0.6rem 1.25rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 600; font-size: 0.85rem; text-decoration: none;">
                    Kembali ke Halaman Pengaduan
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
