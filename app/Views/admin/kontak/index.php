<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Pesan &amp; Aspirasi Masuk dari Warga</h2>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Subjek &amp; Pesan</th>
                    <th>Waktu Masuk</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($pesanList)) : ?>
                    <?php foreach ($pesanList as $pesan) : ?>
                        <tr>
                            <td>
                                <div style="font-weight: 700; color: #0f172a;"><?= esc($pesan['nama']) ?></div>
                                <div style="font-size: 0.775rem; color: #0284c7;"><?= esc($pesan['email']) ?></div>
                                <?php if (! empty($pesan['no_hp'])) : ?>
                                    <div style="font-size: 0.75rem; color: #64748b;"><?= esc($pesan['no_hp']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="font-weight: 700; color: #1e293b; margin-bottom: 0.25rem;"><?= esc($pesan['subjek']) ?></div>
                                <div style="font-size: 0.825rem; color: #475569; line-height: 1.5;"><?= nl2br(esc($pesan['pesan'])) ?></div>
                            </td>
                            <td style="font-size: 0.8rem; color: #64748b; white-space: nowrap;">
                                <?= date('d M Y, H:i', strtotime($pesan['created_at'])) ?> WITA
                            </td>
                            <td style="text-align: right;">
                                <form action="<?= base_url('admin/kontak/delete/' . $pesan['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Hapus pesan ini?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-sm-delete" title="Hapus">
                                        <i data-lucide="trash-2" style="width: 16px; height: 16px;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: #64748b; padding: 2.5rem;">
                            Kotak pesan masuk kosong.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
