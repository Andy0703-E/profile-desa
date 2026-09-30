<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<style>
.admin-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.65);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}
.admin-modal-backdrop.open {
    display: flex;
}
.admin-modal-box {
    background: #ffffff;
    border-radius: 16px;
    width: 100%;
    max-width: 540px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    animation: modalPop 0.22s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes modalPop {
    from { opacity: 0; transform: scale(0.95) translateY(8px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
.admin-modal-header {
    padding: 1.25rem 1.5rem;
    background: #f8fafc;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.admin-modal-body {
    padding: 1.5rem;
}
.admin-modal-footer {
    padding: 1rem 1.5rem;
    background: #f8fafc;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
}
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem;">
            Manajemen Data &amp; Statistik Kependudukan
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">
            Kelola statistik ringkasan utama serta rincian klasifikasi penduduk (pekerjaan, usia, agama, pendidikan).
        </p>
    </div>
    <button type="button" class="btn-secondary-admin" id="btnOpenStatistikModal" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; padding: 0.6rem 1rem; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.85rem; font-weight: 600;">
        <i data-lucide="plus-circle" style="width: 16px; height: 16px;"></i>
        <span>Tambah Indikator Statistik</span>
    </button>
</div>

<!-- 1. Form Update Statistik Utama -->
<div class="card" style="margin-bottom: 1.5rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h3 class="card-title" style="margin-bottom: 0;">Indikator Statistik Utama</h3>
        <span style="font-size: 0.78rem; color: #64748b;">Ubah angka langsung di bawah lalu klik simpan</span>
    </div>
    <form action="<?= base_url('admin/data-desa/update-statistik') ?>" method="post">
        <?= csrf_field() ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
            <?php foreach ($statistikList as $st) : ?>
                <div class="form-group" style="margin-bottom: 0; background: #f8fafc; border: 1px solid var(--border); border-radius: 10px; padding: 0.85rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                        <label class="form-label" style="margin-bottom: 0; font-weight: 700; font-size: 0.82rem; color: #1e293b;">
                            <?= esc($st['label']) ?>
                        </label>
                        <?php if (! in_array($st['key_name'], ['total_penduduk', 'kepala_keluarga', 'laki_laki', 'perempuan'])) : ?>
                            <button type="button" onclick="if(confirm('Hapus indikator statistik ini?')) document.getElementById('del-stat-<?= $st['id'] ?>').submit();" style="border: none; background: transparent; color: #ef4444; cursor: pointer; padding: 0;" title="Hapus Indikator">
                                <i data-lucide="trash" style="width: 13px; height: 13px;"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="text" name="stats[<?= $st['id'] ?>]" class="form-control" value="<?= esc($st['value']) ?>" required style="font-weight: 700;">
                        <?php if (! empty($st['satuan'])) : ?>
                            <span style="font-size: 0.75rem; color: #64748b; white-space: nowrap;"><?= esc($st['satuan']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn-primary-admin" style="font-size: 0.825rem; padding: 0.55rem 1.25rem;">
            <i data-lucide="save" style="width: 15px; height: 15px;"></i>
            <span>Simpan Nilai Indikator</span>
        </button>
    </form>

    <!-- Hidden forms for delete custom stats -->
    <?php foreach ($statistikList as $st) : ?>
        <?php if (! in_array($st['key_name'], ['total_penduduk', 'kepala_keluarga', 'laki_laki', 'perempuan'])) : ?>
            <form id="del-stat-<?= $st['id'] ?>" action="<?= base_url('admin/data-desa/delete-statistik/' . $st['id']) ?>" method="post" style="display: none;">
                <?= csrf_field() ?>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<!-- 2. Tambah Klasifikasi Penduduk Baru & Tabel -->
<div style="display: grid; grid-template-columns: 1.8fr 1.2fr; gap: 1.5rem; align-items: start;">
    <!-- Tabel Data Penduduk -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3 class="card-title" style="margin-bottom: 0;">Rincian Kategori Kependudukan</h3>
            <span style="font-size: 0.75rem; color: #64748b;"><?= count($pendudukList) ?> Klasifikasi Terdata</span>
        </div>
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Kategori</th>
                        <th>Klasifikasi</th>
                        <th>Jumlah Jiwa</th>
                        <th>Keterangan</th>
                        <th style="text-align: right; width: 110px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($pendudukList)) : ?>
                        <?php $no = 1; foreach ($pendudukList as $p) : ?>
                            <tr>
                                <td style="color: #64748b; font-size: 0.8rem;"><?= $no++ ?></td>
                                <td style="font-weight: 600; color: #0b6045; font-size: 0.8rem;">
                                    <span style="background: #ecfdf5; padding: 0.2rem 0.5rem; border-radius: 4px;">
                                        <?= esc($p['kategori']) ?>
                                    </span>
                                </td>
                                <td style="font-weight: 700; color: #1e293b;"><?= esc($p['label']) ?></td>
                                <td style="font-weight: 600; color: #0f172a;"><?= number_format((int)$p['jumlah']) ?> Jiwa</td>
                                <td style="font-size: 0.775rem; color: #64748b;"><?= esc($p['keterangan'] ?? '-') ?></td>
                                <td style="text-align: right;">
                                    <div style="display: flex; gap: 0.35rem; justify-content: flex-end;">
                                        <button type="button" class="btn-action edit btn-edit-penduduk" 
                                            data-id="<?= $p['id'] ?>"
                                            data-kategori="<?= esc($p['kategori']) ?>"
                                            data-label="<?= esc($p['label']) ?>"
                                            data-jumlah="<?= esc($p['jumlah']) ?>"
                                            data-urutan="<?= esc($p['urutan']) ?>"
                                            data-keterangan="<?= esc($p['keterangan'] ?? '') ?>"
                                            title="Edit Baris Data">
                                            <i data-lucide="edit-3" style="width: 14px; height: 14px;"></i>
                                        </button>
                                        <form action="<?= base_url('admin/data-desa/delete-penduduk/' . $p['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus klasifikasi <?= esc(addslashes($p['label'])) ?>?');">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn-action delete" title="Hapus Data">
                                                <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td colspan="6" style="text-align: center; color: #64748b; padding: 2.5rem 1rem;">Belum ada rincian data penduduk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah / Edit Klasifikasi -->
    <?php
    $isEdit = !empty($editPenduduk);
    $formAction = $isEdit ? base_url('admin/data-desa/update-penduduk/' . $editPenduduk['id']) : base_url('admin/data-desa/store-penduduk');
    ?>
    <div class="card" id="form-penduduk">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3 class="card-title" style="margin-bottom: 0;">
                <?= $isEdit ? 'Edit Klasifikasi Penduduk' : 'Tambah Klasifikasi Penduduk' ?>
            </h3>
            <?php if ($isEdit): ?>
                <a href="<?= base_url('admin/data-desa') ?>" style="font-size: 0.75rem; color: #ef4444; font-weight: 700; text-decoration: none;">
                    Batal Edit &times;
                </a>
            <?php endif; ?>
        </div>

        <form action="<?= $formAction ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                <input type="text" name="kategori" class="form-control" required placeholder="Contoh: Pekerjaan, Usia, Pendidikan, Agama" value="<?= esc($editPenduduk['kategori'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Klasifikasi / Label <span style="color: #ef4444;">*</span></label>
                <input type="text" name="label" class="form-control" required placeholder="Contoh: Nelayan Tangkap / Petani Kopra" value="<?= esc($editPenduduk['label'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Jumlah Jiwa <span style="color: #ef4444;">*</span></label>
                <input type="number" name="jumlah" class="form-control" required min="0" placeholder="0" value="<?= esc($editPenduduk['jumlah'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Nomor Urutan Tampil <span style="color: #ef4444;">*</span></label>
                <input type="number" name="urutan" class="form-control" required min="1" value="<?= esc($editPenduduk['urutan'] ?? 1) ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Keterangan Tambahan (Opsional)</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Tersebar di 4 Dusun..." value="<?= esc($editPenduduk['keterangan'] ?? '') ?>">
            </div>

            <button type="submit" class="btn-primary-admin" style="width: 100%; justify-content: center; padding: 0.75rem;">
                <i data-lucide="<?= $isEdit ? 'save' : 'plus' ?>" style="width: 16px; height: 16px;"></i>
                <span><?= $isEdit ? 'Simpan Perubahan Data' : 'Tambahkan Data Baru' ?></span>
            </button>
        </form>
    </div>
</div>

<!-- Modal Edit Klasifikasi Penduduk (Popup Cepat) -->
<div class="admin-modal-backdrop" id="modalEditPenduduk">
    <div class="admin-modal-box">
        <div class="admin-modal-header">
            <h3 style="font-size: 1.05rem; font-weight: 700; color: #0f172a; margin: 0;">
                Edit Klasifikasi Kependudukan
            </h3>
            <button type="button" class="btn-close-modal" id="btnCloseModalEdit" style="border: none; background: transparent; font-size: 1.25rem; color: #64748b; cursor: pointer; padding: 0;">
                &times;
            </button>
        </div>
        <form id="formModalEditPenduduk" action="" method="post">
            <?= csrf_field() ?>
            <div class="admin-modal-body">
                <div class="form-group">
                    <label class="form-label">Kategori <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="kategori" id="modal_kategori" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Klasifikasi / Label <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="label" id="modal_label" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Jumlah Jiwa <span style="color: #ef4444;">*</span></label>
                    <input type="number" name="jumlah" id="modal_jumlah" class="form-control" required min="0">
                </div>

                <div class="form-group">
                    <label class="form-label">Urutan Tampil <span style="color: #ef4444;">*</span></label>
                    <input type="number" name="urutan" id="modal_urutan" class="form-control" required min="1">
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Keterangan Tambahan</label>
                    <input type="text" name="keterangan" id="modal_keterangan" class="form-control">
                </div>
            </div>
            <div class="admin-modal-footer">
                <button type="button" class="btn-secondary-admin" id="btnCancelModalEdit" style="padding: 0.55rem 1.25rem; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.85rem; font-weight: 600;">
                    Batal
                </button>
                <button type="submit" class="btn-primary-admin" style="padding: 0.55rem 1.5rem; font-size: 0.85rem;">
                    <i data-lucide="save" style="width: 15px; height: 15px;"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Indikator Statistik Utama -->
<div class="admin-modal-backdrop" id="modalStatistikBaru">
    <div class="admin-modal-box">
        <div class="admin-modal-header">
            <h3 style="font-size: 1.05rem; font-weight: 700; color: #0f172a; margin: 0;">
                Tambah Indikator Statistik Utama
            </h3>
            <button type="button" class="btn-close-modal" id="btnCloseModalStatistik" style="border: none; background: transparent; font-size: 1.25rem; color: #64748b; cursor: pointer; padding: 0;">
                &times;
            </button>
        </div>
        <form action="<?= base_url('admin/data-desa/store-statistik') ?>" method="post">
            <?= csrf_field() ?>
            <div class="admin-modal-body">
                <div class="form-group">
                    <label class="form-label">Label Indikator <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="label" class="form-control" required placeholder="Contoh: Jumlah Lansia / Tingkat Melek Huruf">
                </div>

                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label class="form-label">Nilai / Angka <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="value" class="form-control" required placeholder="Contoh: 142">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="Contoh: Jiwa / %">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Nomor Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="5" min="1">
                </div>
            </div>
            <div class="admin-modal-footer">
                <button type="button" class="btn-secondary-admin" id="btnCancelModalStatistik" style="padding: 0.55rem 1.25rem; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.85rem; font-weight: 600;">
                    Batal
                </button>
                <button type="submit" class="btn-primary-admin" style="padding: 0.55rem 1.5rem; font-size: 0.85rem;">
                    <i data-lucide="plus" style="width: 15px; height: 15px;"></i>
                    <span>Tambahkan Indikator</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Modal Edit Penduduk
    const modalEdit = document.getElementById('modalEditPenduduk');
    const formModalEdit = document.getElementById('formModalEditPenduduk');
    const btnCloseModalEdit = document.getElementById('btnCloseModalEdit');
    const btnCancelModalEdit = document.getElementById('btnCancelModalEdit');

    const modalKategori = document.getElementById('modal_kategori');
    const modalLabel = document.getElementById('modal_label');
    const modalJumlah = document.getElementById('modal_jumlah');
    const modalUrutan = document.getElementById('modal_urutan');
    const modalKeterangan = document.getElementById('modal_keterangan');

    document.querySelectorAll('.btn-edit-penduduk').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const kategori = this.getAttribute('data-kategori');
            const label = this.getAttribute('data-label');
            const jumlah = this.getAttribute('data-jumlah');
            const urutan = this.getAttribute('data-urutan');
            const keterangan = this.getAttribute('data-keterangan');

            formModalEdit.action = '<?= base_url('admin/data-desa/update-penduduk') ?>/' + id;
            modalKategori.value = kategori;
            modalLabel.value = label;
            modalJumlah.value = jumlah;
            modalUrutan.value = urutan;
            modalKeterangan.value = keterangan;

            modalEdit.classList.add('open');
        });
    });

    function closeEditModal() {
        modalEdit.classList.remove('open');
    }
    if (btnCloseModalEdit) btnCloseModalEdit.addEventListener('click', closeEditModal);
    if (btnCancelModalEdit) btnCancelModalEdit.addEventListener('click', closeEditModal);

    // 2. Modal Tambah Statistik
    const modalStatistik = document.getElementById('modalStatistikBaru');
    const btnOpenStat = document.getElementById('btnOpenStatistikModal');
    const btnCloseStat = document.getElementById('btnCloseModalStatistik');
    const btnCancelStat = document.getElementById('btnCancelModalStatistik');

    if (btnOpenStat) {
        btnOpenStat.addEventListener('click', function() {
            modalStatistik.classList.add('open');
        });
    }

    function closeStatModal() {
        modalStatistik.classList.remove('open');
    }
    if (btnCloseStat) btnCloseStat.addEventListener('click', closeStatModal);
    if (btnCancelStat) btnCancelStat.addEventListener('click', closeStatModal);

    // Close on backdrop click & ESC key
    window.addEventListener('click', function(e) {
        if (e.target === modalEdit) closeEditModal();
        if (e.target === modalStatistik) closeStatModal();
    });

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
            closeStatModal();
        }
    });

    // Re-initialize Lucide Icons
    if (typeof lucide !== 'undefined' && lucide.createIcons) {
        lucide.createIcons();
    }
});
</script>

<?= $this->endSection() ?>
