<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 3rem 0 2rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2.5rem;
    }
    .search-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 2rem;
        max-width: 680px;
        margin: 0 auto 2.5rem;
    }
    .status-badge {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 9999px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: capitalize;
    }
    .status-diajukan { background: #e0f2fe; color: #0369a1; }
    .status-diperiksa { background: #fef3c7; color: #92400e; }
    .status-diproses { background: #fef08a; color: #854d0e; }
    .status-disetujui { background: #dcfce7; color: #166534; }
    .status-selesai { background: #bbf7d0; color: #14532d; }
    .status-ditolak { background: #fee2e2; color: #991b1b; }
</style>

<div class="page-header">
    <div class="container" style="text-align: center;">
        <h1 style="font-size: 2.25rem; font-weight: 800; color: #14532d;">Lacak Pengajuan Surat</h1>
        <p style="font-size: 1rem; color: #64748b; margin-top: 0.5rem;">Periksa status verifikasi permohonan layanan publik Desa Batu Bingkung</p>
    </div>
</div>

<div class="container">
    <div class="search-card">
        <form action="<?= base_url('layanan/cek-status') ?>" method="get">
            <label style="display: block; font-size: 0.9rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">
                Masukkan Nomor Tiket Pengajuan:
            </label>
            <div style="display: flex; gap: 0.5rem;">
                <input type="text" name="tiket" value="<?= esc($tiket) ?>" placeholder="Contoh: BBK-20260921-ABCD" required
                       style="flex: 1; padding: 0.75rem 1rem; border-radius: var(--radius-pill); border: 1.5px solid #cbd5e1; outline: none;">
                <button type="submit" style="background: #15803d; color: #fff; border: none; padding: 0.75rem 1.5rem; border-radius: var(--radius-pill); font-weight: 700; cursor: pointer;">
                    Cari Tiket
                </button>
            </div>
        </form>

        <?php if ($tiket && $pengajuan) : ?>
            <div style="margin-top: 2rem; border-top: 2px dashed #e2e8f0; padding-top: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <div>
                        <span style="font-size: 0.8rem; color: #64748b;">Nomor Tiket:</span>
                        <div style="font-size: 1.25rem; font-weight: 800; color: #15803d;"><?= esc($pengajuan['nomor_tiket']) ?></div>
                    </div>
                    <span class="status-badge status-<?= esc($pengajuan['status']) ?>">
                        <?= esc($pengajuan['status']) ?>
                    </span>
                </div>

                <div style="background: #f8fafc; border-radius: var(--radius-md); padding: 1.25rem; display: flex; flex-direction: column; gap: 0.65rem; font-size: 0.9rem;">
                    <div><strong>Layanan:</strong> <?= esc($pengajuan['nama_layanan']) ?></div>
                    <div><strong>Nama Pemohon:</strong> <?= esc($pengajuan['nama_pemohon']) ?></div>
                    <div><strong>Waktu Diajukan:</strong> <?= date('d M Y, H:i', strtotime($pengajuan['created_at'])) ?> WITA</div>
                    <div><strong>Alamat:</strong> <?= esc($pengajuan['alamat']) ?></div>
                </div>

                <div style="margin-top: 1.25rem; background: #f0fdf4; border-left: 4px solid #15803d; padding: 1rem; border-radius: 6px;">
                    <div style="font-size: 0.85rem; font-weight: 700; color: #166534; margin-bottom: 0.25rem;">Tanggapan / Catatan Petugas Desa:</div>
                    <div style="font-size: 0.9rem; color: #14532d;"><?= esc($pengajuan['tanggapan_admin'] ?? 'Sedang dalam antrean verifikasi.') ?></div>
                </div>
            </div>
        <?php elseif ($tiket && ! $pengajuan) : ?>
            <div style="margin-top: 1.75rem; text-align: center; color: #991b1b; background: #fef2f2; padding: 1rem; border-radius: 8px;">
                Nomor tiket "<strong><?= esc($tiket) ?></strong>" tidak ditemukan. Pastikan nomor tiket ditulis dengan benar.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
