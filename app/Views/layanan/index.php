<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .page-header {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        padding: 3rem 0 2rem;
        border-bottom: 1px solid var(--border-subtle);
        margin-bottom: 2.5rem;
    }
    .page-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: #14532d;
        line-height: 1.2;
    }
    .page-sub {
        font-size: 1rem;
        color: var(--text-muted);
        margin-top: 0.5rem;
    }
    .check-ticket-banner {
        background: #f0fdf4;
        border: 1.5px solid #86efac;
        border-radius: var(--radius-xl);
        padding: 1.5rem 2rem;
        margin-bottom: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1.25rem;
    }
    .ticket-input-form {
        display: flex;
        gap: 0.5rem;
        flex: 1;
        max-width: 420px;
    }
    .ticket-input {
        flex: 1;
        padding: 0.65rem 1rem;
        border-radius: var(--radius-pill);
        border: 1.5px solid #bbf7d0;
        outline: none;
        font-size: 0.9rem;
    }
    .ticket-input:focus {
        border-color: #15803d;
    }
    .btn-check-ticket {
        background: #15803d;
        color: #ffffff;
        border: none;
        padding: 0.65rem 1.25rem;
        border-radius: var(--radius-pill);
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-check-ticket:hover {
        background: #166534;
    }
    .service-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    .service-card {
        background: #ffffff;
        border-radius: var(--radius-xl);
        border: 1px solid var(--border-subtle);
        box-shadow: var(--shadow-card);
        padding: 1.75rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.25s ease;
    }
    .service-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
        border-color: #86efac;
    }
    .service-top-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }
    .service-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.5rem;
    }
    .service-description {
        font-size: 0.875rem;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 1.25rem;
    }
    .service-meta-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.8rem;
        color: #334155;
        background: #f8fafc;
        padding: 0.5rem 0.8rem;
        border-radius: var(--radius-md);
        margin-bottom: 1.25rem;
    }
    .btn-action-apply {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: #65a30d;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.875rem;
        padding: 0.65rem 1.25rem;
        border-radius: var(--radius-pill);
        transition: all 0.2s ease;
    }
    .btn-action-apply:hover {
        background: #4d7c0f;
    }
    @media (max-width: 991px) {
        .service-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 640px) {
        .service-grid {
            grid-template-columns: 1fr;
        }
        .check-ticket-banner {
            flex-direction: column;
            align-items: stretch;
        }
        .ticket-input-form {
            max-width: 100%;
        }
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Layanan Publik Masyarakat</h1>
        <p class="page-sub">Pelayanan administrasi kependudukan dan surat keterangan resmi Desa Batu Bingkung</p>
    </div>
</div>

<div class="container">
    <!-- Cek Status Tiket Banner -->
    <div class="check-ticket-banner">
        <div>
            <h2 style="font-size: 1.1rem; font-weight: 800; color: #166534; display: flex; align-items: center; gap: 0.5rem;">
                <i data-lucide="ticket" style="width: 20px; height: 20px;"></i>
                <span>Sudah Mengajukan Layanan?</span>
            </h2>
            <p style="font-size: 0.85rem; color: #475569; margin-top: 0.2rem;">Lacak progres penerbitan berkas permohonan dengan memasukkan nomor tiket.</p>
        </div>

        <form action="<?= base_url('layanan/cek-status') ?>" method="get" class="ticket-input-form">
            <input type="text" name="tiket" class="ticket-input" placeholder="Contoh: BBK-20260921-ABCD" required>
            <button type="submit" class="btn-check-ticket">Lacak Status</button>
        </form>
    </div>

    <!-- Grid Layanan -->
    <div class="service-grid">
        <?php if (! empty($layananList)) : ?>
            <?php foreach ($layananList as $lay) : ?>
                <div class="service-card">
                    <div>
                        <div class="service-top-icon">
                            <i data-lucide="<?= esc($lay['icon'] ?? 'file-text') ?>" style="width: 24px; height: 24px;"></i>
                        </div>
                        <h3 class="service-name"><?= esc($lay['nama_layanan']) ?></h3>
                        <p class="service-description"><?= esc($lay['deskripsi']) ?></p>
                    </div>

                    <div>
                        <div class="service-meta-row">
                            <span><i data-lucide="clock" style="width: 14px; height: 14px; vertical-align: -2px;"></i> <?= esc($lay['estimasi_waktu']) ?></span>
                            <span style="font-weight: 700; color: #15803d;"><?= esc($lay['biaya']) ?></span>
                        </div>
                        <a href="<?= base_url('layanan/' . esc($lay['slug'])) ?>" class="btn-action-apply">
                            <span>Lihat Persyaratan &amp; Ajukan</span>
                            <i data-lucide="arrow-right" style="width: 16px; height: 16px;"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div style="grid-column: span 3; text-align: center; padding: 4rem; color: #64748b;">
                Belum ada data layanan publik yang aktif.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
