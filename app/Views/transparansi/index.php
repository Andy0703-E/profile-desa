<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section with Breadcrumb -->
<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Transparansi APBDes</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Transparansi Keuangan Desa</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Wujud komitmen keterbukaan informasi publik Pemerintah <?= esc($desa['nama_desa']) ?> dalam pengelolaan Anggaran Pendapatan dan Belanja Desa (APBDes).
        </p>

        <!-- Selector Tahun -->
        <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
            <?php foreach ($allYears as $y): ?>
                <a href="<?= base_url('transparansi?tahun=' . $y['tahun']) ?>" 
                   style="padding: 0.5rem 1.25rem; border-radius: 9999px; font-weight: 700; font-size: 0.88rem; text-decoration: none; transition: 0.2s; <?= $selectedYear == $y['tahun'] ? 'background: #10b981; color: #ffffff;' : 'background: rgba(255,255,255,0.15); color: #ffffff;' ?>">
                    TA <?= $y['tahun'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <?php if ($apbdes): ?>
        <!-- Ringkasan Angka Utama (3 Card) -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <!-- Pendapatan -->
            <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: #10b981;"></div>
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <div>
                        <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: #059669; letter-spacing: 0.05em;">Pendapatan Desa</span>
                        <h3 style="font-size: 1.45rem; font-weight: 800; color: #064e3b; margin-top: 0.25rem;">
                            Rp <?= number_format($apbdes['total_pendapatan'], 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: #ecfdf5; color: #10b981; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="trending-up" style="width: 22px; height: 22px;"></i>
                    </div>
                </div>
                <div style="background: #f8fafc; border-radius: 8px; padding: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; font-size: 0.82rem; margin-bottom: 0.35rem;">
                        <span style="color: #64748b;">Realisasi:</span>
                        <strong style="color: #0f172a;">Rp <?= number_format($apbdes['realisasi_pendapatan'], 0, ',', '.') ?></strong>
                    </div>
                    <?php 
                        $pctPendapatan = $apbdes['total_pendapatan'] > 0 ? round(($apbdes['realisasi_pendapatan'] / $apbdes['total_pendapatan']) * 100, 1) : 0;
                    ?>
                    <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden;">
                        <div style="width: <?= min(100, $pctPendapatan) ?>%; height: 100%; background: #10b981;"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.75rem; font-weight: 700; color: #059669; margin-top: 0.25rem;">
                        <?= $pctPendapatan ?>% Tercapai
                    </div>
                </div>
            </div>

            <!-- Belanja -->
            <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: #f59e0b;"></div>
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <div>
                        <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: #d97706; letter-spacing: 0.05em;">Belanja Desa</span>
                        <h3 style="font-size: 1.45rem; font-weight: 800; color: #78350f; margin-top: 0.25rem;">
                            Rp <?= number_format($apbdes['total_belanja'], 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="shopping-bag" style="width: 22px; height: 22px;"></i>
                    </div>
                </div>
                <div style="background: #f8fafc; border-radius: 8px; padding: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; font-size: 0.82rem; margin-bottom: 0.35rem;">
                        <span style="color: #64748b;">Serapan:</span>
                        <strong style="color: #0f172a;">Rp <?= number_format($apbdes['realisasi_belanja'], 0, ',', '.') ?></strong>
                    </div>
                    <?php 
                        $pctBelanja = $apbdes['total_belanja'] > 0 ? round(($apbdes['realisasi_belanja'] / $apbdes['total_belanja']) * 100, 1) : 0;
                    ?>
                    <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden;">
                        <div style="width: <?= min(100, $pctBelanja) ?>%; height: 100%; background: #f59e0b;"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.75rem; font-weight: 700; color: #d97706; margin-top: 0.25rem;">
                        <?= $pctBelanja ?>% Terserap
                    </div>
                </div>
            </div>

            <!-- Pembiayaan -->
            <div style="background: #ffffff; border-radius: 16px; padding: 1.5rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.04); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: #3b82f6;"></div>
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <div>
                        <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: #2563eb; letter-spacing: 0.05em;">Pembiayaan Netto</span>
                        <h3 style="font-size: 1.45rem; font-weight: 800; color: #1e3a8a; margin-top: 0.25rem;">
                            Rp <?= number_format($apbdes['total_pembiayaan'], 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center;">
                        <i data-lucide="layers" style="width: 22px; height: 22px;"></i>
                    </div>
                </div>
                <div style="background: #f8fafc; border-radius: 8px; padding: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; font-size: 0.82rem; margin-bottom: 0.35rem;">
                        <span style="color: #64748b;">Realisasi:</span>
                        <strong style="color: #0f172a;">Rp <?= number_format($apbdes['realisasi_pembiayaan'], 0, ',', '.') ?></strong>
                    </div>
                    <?php 
                        $pctPembiayaan = $apbdes['total_pembiayaan'] > 0 ? round(($apbdes['realisasi_pembiayaan'] / $apbdes['total_pembiayaan']) * 100, 1) : 0;
                    ?>
                    <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden;">
                        <div style="width: <?= min(100, $pctPembiayaan) ?>%; height: 100%; background: #3b82f6;"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.75rem; font-weight: 700; color: #2563eb; margin-top: 0.25rem;">
                        <?= $pctPembiayaan ?>% Realisasi
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Rincian APBDes -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: #0f172a;">Rincian Item Rekening APBDes <?= esc($apbdes['tahun']) ?></h2>
                    <p style="font-size: 0.85rem; color: #64748b;"><?= esc($apbdes['judul']) ?> (<?= ucfirst($apbdes['jenis']) ?>)</p>
                </div>
                <?php if (!empty($apbdes['file_pdf'])): ?>
                    <a href="<?= base_url($apbdes['file_pdf']) ?>" target="_blank" style="display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.5rem 1rem; background: #0b6045; color: #ffffff; border-radius: 8px; font-size: 0.85rem; font-weight: 600; text-decoration: none;">
                        <i data-lucide="download" style="width: 16px; height: 16px;"></i>
                        Unduh Salinan PDF
                    </a>
                <?php endif; ?>
            </div>

            <!-- Bagian 1: Pendapatan -->
            <h3 style="font-size: 1rem; font-weight: 700; color: #059669; margin: 1.5rem 0 0.75rem; border-bottom: 2px solid #ecfdf5; padding-bottom: 0.4rem;">
                1. KELOMPOK PENDAPATAN DESA
            </h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.88rem; text-align: left;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 0.75rem 1rem; color: #475569; width: 120px;">Kode</th>
                            <th style="padding: 0.75rem 1rem; color: #475569;">Uraian Sumber Dana</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Anggaran (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Realisasi (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: center; width: 100px;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pendapatan)): ?>
                            <tr><td colspan="5" style="padding: 1rem; text-align: center; color: #94a3b8;">Belum ada rincian pendapatan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($pendapatan as $r): ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 0.75rem 1rem; font-family: monospace; color: #64748b; font-weight: 600;"><?= esc($r['kode_rekening']) ?></td>
                                    <td style="padding: 0.75rem 1rem; font-weight: 600; color: #1e293b;"><?= esc($r['uraian']) ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #0f172a;"><?= number_format($r['anggaran'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #059669; font-weight: 600;"><?= number_format($r['realisasi'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: center;">
                                        <span style="padding: 0.2rem 0.5rem; border-radius: 9999px; background: #ecfdf5; color: #059669; font-size: 0.75rem; font-weight: 700;">
                                            <?= $r['persentase'] ?>%
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Bagian 2: Belanja -->
            <h3 style="font-size: 1rem; font-weight: 700; color: #d97706; margin: 2rem 0 0.75rem; border-bottom: 2px solid #fef3c7; padding-bottom: 0.4rem;">
                2. KELOMPOK BELANJA DESA
            </h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.88rem; text-align: left;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 0.75rem 1rem; color: #475569; width: 120px;">Kode</th>
                            <th style="padding: 0.75rem 1rem; color: #475569;">Uraian Bidang Belanja</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Anggaran (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Realisasi (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: center; width: 100px;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($belanja)): ?>
                            <tr><td colspan="5" style="padding: 1rem; text-align: center; color: #94a3b8;">Belum ada rincian belanja.</td></tr>
                        <?php else: ?>
                            <?php foreach ($belanja as $r): ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 0.75rem 1rem; font-family: monospace; color: #64748b; font-weight: 600;"><?= esc($r['kode_rekening']) ?></td>
                                    <td style="padding: 0.75rem 1rem; font-weight: 600; color: #1e293b;"><?= esc($r['uraian']) ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #0f172a;"><?= number_format($r['anggaran'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #d97706; font-weight: 600;"><?= number_format($r['realisasi'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: center;">
                                        <span style="padding: 0.2rem 0.5rem; border-radius: 9999px; background: #fef3c7; color: #d97706; font-size: 0.75rem; font-weight: 700;">
                                            <?= $r['persentase'] ?>%
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Bagian 3: Pembiayaan -->
            <h3 style="font-size: 1rem; font-weight: 700; color: #2563eb; margin: 2rem 0 0.75rem; border-bottom: 2px solid #eff6ff; padding-bottom: 0.4rem;">
                3. KELOMPOK PEMBIAYAAN DESA
            </h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.88rem; text-align: left;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 0.75rem 1rem; color: #475569; width: 120px;">Kode</th>
                            <th style="padding: 0.75rem 1rem; color: #475569;">Uraian Pos Pembiayaan</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Anggaran (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: right;">Realisasi (Rp)</th>
                            <th style="padding: 0.75rem 1rem; color: #475569; text-align: center; width: 100px;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pembiayaan)): ?>
                            <tr><td colspan="5" style="padding: 1rem; text-align: center; color: #94a3b8;">Belum ada rincian pembiayaan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($pembiayaan as $r): ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 0.75rem 1rem; font-family: monospace; color: #64748b; font-weight: 600;"><?= esc($r['kode_rekening']) ?></td>
                                    <td style="padding: 0.75rem 1rem; font-weight: 600; color: #1e293b;"><?= esc($r['uraian']) ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #0f172a;"><?= number_format($r['anggaran'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: right; color: #2563eb; font-weight: 600;"><?= number_format($r['realisasi'], 0, ',', '.') ?></td>
                                    <td style="padding: 0.75rem 1rem; text-align: center;">
                                        <span style="padding: 0.2rem 0.5rem; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 0.75rem; font-weight: 700;">
                                            <?= $r['persentase'] ?>%
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
            <i data-lucide="file-question" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
            <h3 style="font-size: 1.1rem; font-weight: 700; color: #1e293b;">Data APBDes Belum Tersedia</h3>
            <p>Silakan pilih tahun anggaran lainnya atau hubungi pihak pengelola desa.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
