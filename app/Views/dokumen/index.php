<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Dokumen Publik</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Informasi Publik & Dokumen Desa</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Akses dan unduh Peraturan Desa (Perdes), SK Kepala Desa, RPJMDes, RKPDes, APBDes, serta Laporan Pertanggungjawaban (LPJ).
        </p>

        <!-- Form Filter & Pencarian -->
        <form method="get" action="<?= base_url('dokumen') ?>" style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap; max-width: 650px;">
            <input type="text" name="q" value="<?= esc($keyword) ?>" placeholder="Cari nama atau nomor dokumen..." 
                   style="flex: 1; min-width: 240px; padding: 0.65rem 1rem; border-radius: 8px; border: none; font-size: 0.88rem; outline: none;">
            <select name="kategori" style="padding: 0.65rem 1rem; border-radius: 8px; border: none; font-size: 0.88rem; background: #ffffff; color: #1e293b; outline: none;">
                <option value="semua">Semua Kategori</option>
                <option value="perdes" <?= $kategori === 'perdes' ? 'selected' : '' ?>>Peraturan Desa (Perdes)</option>
                <option value="sk_kades" <?= $kategori === 'sk_kades' ? 'selected' : '' ?>>SK Kepala Desa</option>
                <option value="rpjmdes" <?= $kategori === 'rpjmdes' ? 'selected' : '' ?>>RPJMDes</option>
                <option value="rkpdes" <?= $kategori === 'rkpdes' ? 'selected' : '' ?>>RKPDes</option>
                <option value="lpj" <?= $kategori === 'lpj' ? 'selected' : '' ?>>Laporan Pertanggungjawaban (LPJ)</option>
            </select>
            <button type="submit" style="padding: 0.65rem 1.25rem; background: #10b981; color: #ffffff; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                Cari Dokumen
            </button>
        </form>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Daftar Dokumen -->
    <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
        <?php if (empty($dokumenList)): ?>
            <div style="padding: 3rem; text-align: center; color: #64748b;">
                <i data-lucide="folder-x" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Dokumen Tidak Ditemukan</h3>
                <p>Tidak ada dokumen yang sesuai dengan kata kunci atau kategori yang Anda pilih.</p>
            </div>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.88rem; text-align: left;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 1rem; color: #475569; width: 50px;">No</th>
                            <th style="padding: 1rem; color: #475569;">Judul & Informasi Dokumen</th>
                            <th style="padding: 1rem; color: #475569; width: 140px;">Kategori</th>
                            <th style="padding: 1rem; color: #475569; width: 90px; text-align: center;">Tahun</th>
                            <th style="padding: 1rem; color: #475569; width: 100px;">Ukuran</th>
                            <th style="padding: 1rem; color: #475569; width: 130px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokumenList as $idx => $doc): ?>
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 1rem; color: #94a3b8; font-weight: 600;"><?= $idx + 1 ?></td>
                                <td style="padding: 1rem;">
                                    <div style="font-weight: 700; color: #0f172a; font-size: 0.95rem; margin-bottom: 0.2rem;">
                                        <?= esc($doc['judul']) ?>
                                    </div>
                                    <div style="font-size: 0.8rem; color: #64748b; display: flex; gap: 0.75rem;">
                                        <span>No: <strong style="color: #334155;"><?= esc($doc['nomor_dokumen'] ?? '-') ?></strong></span>
                                        <span>&bull;</span>
                                        <span>Diunduh: <?= (int)$doc['total_download'] ?> kali</span>
                                    </div>
                                    <?php if (!empty($doc['deskripsi'])): ?>
                                        <p style="font-size: 0.82rem; color: #64748b; margin-top: 0.35rem; line-height: 1.4;">
                                            <?= esc($doc['deskripsi']) ?>
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <td style="padding: 1rem;">
                                    <span style="display: inline-block; padding: 0.25rem 0.6rem; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">
                                        <?= esc($doc['kategori']) ?>
                                    </span>
                                </td>
                                <td style="padding: 1rem; text-align: center; font-weight: 600; color: #1e293b;">
                                    <?= esc($doc['tahun']) ?>
                                </td>
                                <td style="padding: 1rem; color: #64748b; font-size: 0.82rem;">
                                    <?= esc($doc['ukuran_file'] ?? '-') ?>
                                </td>
                                <td style="padding: 1rem; text-align: center;">
                                    <a href="<?= base_url('dokumen/download/' . $doc['id']) ?>" 
                                       style="display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.45rem 0.8rem; background: #0b6045; color: #ffffff; border-radius: 6px; font-weight: 600; font-size: 0.8rem; text-decoration: none;">
                                        <i data-lucide="download" style="width: 14px; height: 14px;"></i> Unduh PDF
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
