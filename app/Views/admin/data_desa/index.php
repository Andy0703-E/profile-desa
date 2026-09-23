<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Manajemen Data &amp; Statistik Kependudukan</h2>
</div>

<!-- 1. Form Update Statistik Utama -->
<div class="card">
    <h3 class="card-title" style="margin-bottom: 1rem;">Indikator Statistik Utama</h3>
    <form action="<?= base_url('admin/data-desa/update-statistik') ?>" method="post">
        <?= csrf_field() ?>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1rem;">
            <?php foreach ($statistikList as $st) : ?>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label"><?= esc($st['label']) ?> (<?= esc($st['satuan']) ?>)</label>
                    <input type="text" name="stats[<?= $st['id'] ?>]" class="form-control" value="<?= esc($st['value']) ?>" required>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn-primary-admin" style="font-size: 0.825rem; padding: 0.45rem 1rem;">
            <i data-lucide="save" style="width: 14px; height: 14px;"></i>
            <span>Simpan Indikator</span>
        </button>
    </form>
</div>

<!-- 2. Tambah Klasifikasi Penduduk Baru & Tabel -->
<div style="display: grid; grid-template-columns: 1.8fr 1.2fr; gap: 1.5rem; align-items: start;">
    <!-- Tabel Data Penduduk -->
    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1rem;">Rincian Kategori Kependudukan</h3>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Klasifikasi</th>
                        <th>Jumlah Jiwa</th>
                        <th>Keterangan</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($pendudukList)) : ?>
                        <?php foreach ($pendudukList as $p) : ?>
                            <tr>
                                <td style="font-weight: 600; color: #15803d; font-size: 0.8rem;"><?= esc($p['kategori']) ?></td>
                                <td style="font-weight: 700; color: #1e293b;"><?= esc($p['label']) ?></td>
                                <td><?= number_format((int)$p['jumlah']) ?> Jiwa</td>
                                <td style="font-size: 0.775rem; color: #64748b;"><?= esc($p['keterangan'] ?? '-') ?></td>
                                <td style="text-align: right;">
                                    <form action="<?= base_url('admin/data-desa/delete-penduduk/' . $p['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus baris data ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-sm-delete" title="Hapus">
                                            <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td colspan="5" style="text-align: center; color: #64748b; padding: 2rem;">Belum ada rincian data penduduk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah Klasifikasi -->
    <div class="card">
        <h3 class="card-title" style="margin-bottom: 1rem;">Tambah Klasifikasi Penduduk</h3>
        <form action="<?= base_url('admin/data-desa/store-penduduk') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                <input type="text" name="kategori" class="form-control" required placeholder="Contoh: Pekerjaan, Usia, Pendidikan">
            </div>

            <div class="form-group">
                <label class="form-label">Klasifikasi / Label <span style="color: #ef4444;">*</span></label>
                <input type="text" name="label" class="form-control" required placeholder="Contoh: Nelayan Tangkap">
            </div>

            <div class="form-group">
                <label class="form-label">Jumlah Jiwa <span style="color: #ef4444;">*</span></label>
                <input type="number" name="jumlah" class="form-control" required min="0" placeholder="0">
            </div>

            <div class="form-group">
                <label class="form-label">Urutan Tampil <span style="color: #ef4444;">*</span></label>
                <input type="number" name="urutan" class="form-control" required value="1" min="1">
            </div>

            <div class="form-group">
                <label class="form-label">Keterangan Tambahan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Opsional...">
            </div>

            <button type="submit" class="btn-primary-admin" style="width: 100%; justify-content: center; padding: 0.75rem;">
                <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
                <span>Tambahkan Data</span>
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
