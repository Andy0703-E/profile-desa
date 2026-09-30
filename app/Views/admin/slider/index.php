<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem;">
            Manajemen Hero Banner &amp; Slider Parallax
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">
            Ubah foto latar belakang, tag/badge, judul teks, dan subjudul yang muncul pada slider halaman utama (beranda).
        </p>
    </div>
    <div style="display: flex; gap: 0.75rem;">
        <a href="<?= base_url() ?>" target="_blank" class="btn-secondary-admin" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; padding: 0.6rem 1rem; border-radius: 8px; border: 1px solid var(--border); background: #ffffff; color: #334155; font-size: 0.85rem; font-weight: 600;">
            <i data-lucide="external-link" style="width: 16px; height: 16px;"></i>
            <span>Lihat Website</span>
        </a>
        <a href="<?= base_url('admin/slider/create') ?>" class="btn-primary-admin">
            <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
            <span>Tambah Slide Baru</span>
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 60px;">Urutan</th>
                    <th style="width: 140px;">Gambar Latar</th>
                    <th>Teks &amp; Judul Slide</th>
                    <th>Badge / Tag</th>
                    <th>Status</th>
                    <th style="text-align: right; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($sliders)) : ?>
                    <?php foreach ($sliders as $s) : ?>
                        <tr>
                            <td style="font-weight: 800; color: #0b6045; text-align: center;">
                                #<?= esc($s['urutan']) ?>
                            </td>
                            <td>
                                <div style="width: 130px; height: 75px; border-radius: 8px; overflow: hidden; background: #0f172a; position: relative; border: 1px solid var(--border);">
                                    <img src="<?= base_url(esc($s['image'])) ?>" alt="Slide" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </td>
                            <td>
                                <div style="font-weight: 800; color: #0f172a; font-size: 0.95rem; margin-bottom: 0.25rem;">
                                    <?= esc($s['title']) ?>
                                </div>
                                <div style="font-size: 0.8rem; color: #64748b; line-height: 1.4; max-width: 480px;">
                                    <?= esc($s['subtitle']) ?>
                                </div>
                            </td>
                            <td>
                                <span style="background: #ecfdf5; color: #059669; padding: 0.25rem 0.65rem; border-radius: 9999px; font-size: 0.72rem; font-weight: 700; text-transform: uppercase;">
                                    <?= esc($s['tag'] ?? '-') ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($s['status'] === 'aktif') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">
                                        AKTIF
                                    </span>
                                <?php else : ?>
                                    <span style="background: #f1f5f9; color: #64748b; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700;">
                                        NONAKTIF
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                    <a href="<?= base_url('admin/slider/edit/' . $s['id']) ?>" class="btn-action edit" title="Edit Teks & Gambar">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/slider/delete/' . $s['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide ini?');" style="display: inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-action delete" title="Hapus Slide">
                                            <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 3rem 1rem; color: #94a3b8;">
                            Belum ada slide hero. Silakan tambah slide baru.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
