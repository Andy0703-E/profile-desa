<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="max-width: 750px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
        <a href="<?= base_url('admin/agenda') ?>" style="color: #64748b; text-decoration: none;">&larr; Kembali</a>
        <h1 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;"><?= esc($title) ?></h1>
    </div>

    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
        <form method="post" action="<?= $item ? base_url('admin/agenda/update/' . $item['id']) : base_url('admin/agenda/store') ?>">
            <?= csrf_field() ?>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Nama Agenda Kegiatan *</label>
                <input type="text" name="judul" value="<?= esc($item['judul'] ?? '') ?>" required 
                       style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Kategori Kegiatan *</label>
                    <input type="text" name="kategori" value="<?= esc($item['kategori'] ?? 'Musyawarah Desa') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Status *</label>
                    <select name="status" required style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; background: #fff; outline: none;">
                        <option value="akan_datang" <?= ($item['status'] ?? '') === 'akan_datang' ? 'selected' : '' ?>>Akan Datang</option>
                        <option value="berlangsung" <?= ($item['status'] ?? '') === 'berlangsung' ? 'selected' : '' ?>>Sedang Berlangsung</option>
                        <option value="selesai" <?= ($item['status'] ?? '') === 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="dibatalkan" <?= ($item['status'] ?? '') === 'dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tanggal Mulai *</label>
                    <input type="date" name="tanggal_mulai" value="<?= $item['tanggal_mulai'] ?? date('Y-m-d') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tanggal Selesai (Opsional)</label>
                    <input type="date" name="tanggal_selesai" value="<?= $item['tanggal_selesai'] ?? '' ?>" 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Jam Mulai</label>
                    <input type="text" name="jam_mulai" value="<?= esc($item['jam_mulai'] ?? '08.30') ?>" placeholder="08.30"
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Jam Selesai</label>
                    <input type="text" name="jam_selesai" value="<?= esc($item['jam_selesai'] ?? '12.00 WITA') ?>" placeholder="12.00 WITA"
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Tempat / Lokasi *</label>
                    <input type="text" name="lokasi" value="<?= esc($item['lokasi'] ?? '') ?>" required placeholder="Aula Kantor Desa..."
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Penyelenggara *</label>
                    <input type="text" name="penyelenggara" value="<?= esc($item['penyelenggara'] ?? 'Pemerintah Desa') ?>" required 
                           style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">Uraian Kegiatan</label>
                <textarea name="deskripsi" rows="3" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.88rem; outline: none;"><?= esc($item['deskripsi'] ?? '') ?></textarea>
            </div>

            <button type="submit" style="padding: 0.75rem 1.5rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 700; font-size: 0.9rem; border: none; cursor: pointer;">
                Simpan Agenda
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
