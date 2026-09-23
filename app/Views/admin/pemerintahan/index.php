<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Struktur Aparatur Pemerintahan</h2>
    <a href="<?= base_url('admin/pemerintahan/create') ?>" class="btn-primary-admin">
        <i data-lucide="plus" style="width: 16px; height: 16px;"></i>
        <span>Tambah Aparatur</span>
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Urutan</th>
                    <th style="width: 70px;">Foto</th>
                    <th>Nama &amp; Jabatan</th>
                    <th>NIP</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($aparaturList)) : ?>
                    <?php foreach ($aparaturList as $a) : ?>
                        <tr>
                            <td style="text-align: center; font-weight: 700; color: #64748b;"><?= esc($a['urutan']) ?></td>
                            <td>
                                <?php if (! empty($a['foto'])) : ?>
                                    <img src="<?= base_url(esc($a['foto'])) ?>" alt="foto" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                                <?php else : ?>
                                    <div style="width: 48px; height: 48px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                        <i data-lucide="user" style="width: 20px; height: 20px;"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="font-weight: 700; color: #0f172a; margin-bottom: 0.2rem;"><?= esc($a['nama']) ?></div>
                                <div style="font-size: 0.8rem; font-weight: 600; color: #15803d;"><?= esc($a['jabatan']) ?></div>
                            </td>
                            <td style="color: #475569; font-size: 0.85rem;">
                                <?= empty($a['nip']) || $a['nip'] === '-' ? '-' : esc($a['nip']) ?>
                            </td>
                            <td>
                                <?php if ($a['status'] === 'aktif') : ?>
                                    <span style="background: #dcfce7; color: #166534; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Aktif</span>
                                <?php else : ?>
                                    <span style="background: #f1f5f9; color: #475569; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Tidak Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right;">
                                <div class="action-btns" style="justify-content: flex-end;">
                                    <a href="<?= base_url('admin/pemerintahan/edit/' . $a['id']) ?>" class="btn-sm-edit" title="Edit">
                                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i>
                                    </a>
                                    <form action="<?= base_url('admin/pemerintahan/delete/' . $a['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aparatur ini?');">
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
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 2rem;">
                            Belum ada data aparatur pemerintahan desa.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
