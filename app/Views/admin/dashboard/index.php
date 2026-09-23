<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<style>
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .stat-card {
        background: #ffffff;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .stat-info {
        display: flex;
        flex-direction: column;
    }
    .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
        margin-bottom: 0.35rem;
    }
    .stat-label {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 600;
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #475569;
    }
    .c-green { background: #dcfce7; color: #15803d; }
    .c-blue { background: #e0f2fe; color: #0284c7; }
    .c-purple { background: #f3e8ff; color: #7e22ce; }
    .c-orange { background: #ffedd5; color: #c2410c; }
    
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    .status-badge {
        display: inline-block;
        padding: 0.2rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: capitalize;
    }
    .bg-diajukan { background: #e0f2fe; color: #0369a1; }
    .bg-diperiksa { background: #fef3c7; color: #92400e; }
    .bg-diproses { background: #fef08a; color: #854d0e; }
    .bg-disetujui { background: #dcfce7; color: #166534; }
    .bg-selesai { background: #bbf7d0; color: #14532d; }
    .bg-ditolak { background: #fee2e2; color: #991b1b; }

    @media (max-width: 1024px) {
        .dashboard-stats {
            grid-template-columns: repeat(2, 1fr);
        }
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-value"><?= number_format($countBerita) ?></span>
            <span class="stat-label">Total Berita</span>
        </div>
        <div class="stat-icon c-green"><i data-lucide="newspaper"></i></div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-value"><?= number_format($countGaleri) ?></span>
            <span class="stat-label">Total Galeri</span>
        </div>
        <div class="stat-icon c-blue"><i data-lucide="image"></i></div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-value"><?= number_format($countLayanan) ?></span>
            <span class="stat-label">Total Layanan</span>
        </div>
        <div class="stat-icon c-purple"><i data-lucide="file-text"></i></div>
    </div>
    
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-value"><?= number_format($countPengajuan) ?></span>
            <span class="stat-label">Total Pengajuan</span>
        </div>
        <div class="stat-icon c-orange"><i data-lucide="inbox"></i></div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="card">
        <div class="card-header-actions">
            <h2 class="card-title">Pengajuan Layanan Terbaru</h2>
            <a href="<?= base_url('admin/pengajuan') ?>" style="font-size: 0.8rem; font-weight: 600; color: #15803d; text-decoration: none;">Lihat Semua</a>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Tiket</th>
                        <th>Pemohon</th>
                        <th>Layanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($latestPengajuan)) : ?>
                        <?php foreach ($latestPengajuan as $p) : ?>
                            <tr>
                                <td>
                                    <div style="font-weight: 600; color: #15803d; font-size: 0.8rem;"><?= esc($p['nomor_tiket']) ?></div>
                                    <div style="font-size: 0.75rem; color: #64748b;"><?= date('d/m/Y H:i', strtotime($p['created_at'])) ?></div>
                                </td>
                                <td><?= esc($p['nama_pemohon']) ?></td>
                                <td><?= esc($p['nama_layanan']) ?></td>
                                <td>
                                    <span class="status-badge bg-<?= esc($p['status']) ?>"><?= esc($p['status']) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td colspan="4" style="text-align: center; color: #64748b;">Belum ada pengajuan terbaru.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header-actions">
            <h2 class="card-title">Berita Dipublikasikan Terbaru</h2>
            <a href="<?= base_url('admin/berita') ?>" style="font-size: 0.8rem; font-weight: 600; color: #15803d; text-decoration: none;">Lihat Semua</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <?php if (! empty($latestBerita)) : ?>
                <?php foreach ($latestBerita as $b) : ?>
                    <div style="display: flex; gap: 1rem; align-items: flex-start; padding-bottom: 0.75rem; border-bottom: 1px solid #f1f5f9;">
                        <img src="<?= base_url(esc($b['thumbnail'] ?? 'uploads/desa/kantor-desa.webp')) ?>" alt="thumb" style="width: 70px; height: 50px; border-radius: 8px; object-fit: cover;">
                        <div>
                            <div style="font-size: 0.875rem; font-weight: 600; color: #0f172a; margin-bottom: 0.25rem;"><?= esc($b['title']) ?></div>
                            <div style="font-size: 0.75rem; color: #64748b; display: flex; gap: 0.75rem;">
                                <span><i data-lucide="calendar" style="width: 12px; height: 12px; vertical-align: -1px;"></i> <?= date('d M Y', strtotime($b['published_at'])) ?></span>
                                <span><i data-lucide="eye" style="width: 12px; height: 12px; vertical-align: -1px;"></i> <?= number_format($b['views']) ?> views</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div style="text-align: center; color: #64748b; padding: 1rem;">Belum ada berita terbaru.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
