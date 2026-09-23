<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<style>
    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.65rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: capitalize;
    }
    .status-diajukan { background: #e0f2fe; color: #0369a1; }
    .status-diperiksa { background: #fef3c7; color: #92400e; }
    .status-diproses { background: #fef08a; color: #854d0e; }
    .status-disetujui { background: #dcfce7; color: #166534; }
    .status-selesai { background: #bbf7d0; color: #14532d; }
    .status-ditolak { background: #fee2e2; color: #991b1b; }
    .filter-tabs {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }
    .filter-tab {
        padding: 0.4rem 0.9rem;
        border-radius: var(--radius-md);
        background: #ffffff;
        border: 1px solid var(--border);
        text-decoration: none;
        font-size: 0.825rem;
        font-weight: 600;
        color: #475569;
        transition: all 0.2s;
    }
    .filter-tab.active, .filter-tab:hover {
        background: #15803d;
        color: #ffffff;
        border-color: #15803d;
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Pengajuan Surat &amp; Layanan Masyarakat</h2>
</div>

<div class="filter-tabs">
    <a href="<?= base_url('admin/pengajuan') ?>" class="filter-tab <?= empty($activeStatus) ? 'active' : '' ?>">Semua Status</a>
    <a href="<?= base_url('admin/pengajuan?status=diajukan') ?>" class="filter-tab <?= $activeStatus === 'diajukan' ? 'active' : '' ?>">Diajukan</a>
    <a href="<?= base_url('admin/pengajuan?status=diperiksa') ?>" class="filter-tab <?= $activeStatus === 'diperiksa' ? 'active' : '' ?>">Diperiksa</a>
    <a href="<?= base_url('admin/pengajuan?status=diproses') ?>" class="filter-tab <?= $activeStatus === 'diproses' ? 'active' : '' ?>">Diproses</a>
    <a href="<?= base_url('admin/pengajuan?status=disetujui') ?>" class="filter-tab <?= $activeStatus === 'disetujui' ? 'active' : '' ?>">Disetujui</a>
    <a href="<?= base_url('admin/pengajuan?status=selesai') ?>" class="filter-tab <?= $activeStatus === 'selesai' ? 'active' : '' ?>">Selesai</a>
    <a href="<?= base_url('admin/pengajuan?status=ditolak') ?>" class="filter-tab <?= $activeStatus === 'ditolak' ? 'active' : '' ?>">Ditolak</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Tiket</th>
                    <th>Nama Pemohon</th>
                    <th>NIK</th>
                    <th>Layanan Dimohon</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($pengajuanList)) : ?>
                    <?php foreach ($pengajuanList as $p) : ?>
                        <tr>
                            <td>
                                <span style="font-family: monospace; font-weight: 700; color: #15803d; font-size: 0.85rem;">
                                    <?= esc($p['nomor_tiket']) ?>
                                </span>
                            </td>
                            <td>
                                <div style="font-weight: 700; color: #0f172a;"><?= esc($p['nama_pemohon']) ?></div>
                                <div style="font-size: 0.75rem; color: #64748b;">No HP: <?= esc($p['no_hp']) ?></div>
                            </td>
                            <td style="font-family: monospace; font-size: 0.85rem; color: #475569;">
                                <?= esc($p['nik']) ?>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: #1e293b; font-size: 0.85rem;">
                                    <?= esc($p['nama_layanan']) ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 0.8rem; color: #64748b;">
                                    <?= date('d/m/Y H:i', strtotime($p['created_at'])) ?>
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-<?= esc($p['status']) ?>">
                                    <?= esc($p['status']) ?>
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/pengajuan/detail/' . $p['id']) ?>" class="btn-sm-edit" title="Periksa / Detail">
                                        <i data-lucide="eye" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/pengajuan/delete/' . $p['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus pengajuan ini secara permanen?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-sm-delete" title="Hapus">
                                            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: #64748b; padding: 2.5rem;">
                            Belum ada berkas permohonan layanan pada status ini.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
