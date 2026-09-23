<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Pembangunan Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Transparansi Proyek & Pembangunan</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Pantau realisasi fisik infrastruktur, anggaran belanja modal, progres pekerjaan, dan lokasi pembangunan di wilayah <?= esc($desa['nama_desa']) ?>.
        </p>

        <!-- Filter Bar -->
        <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
            <a href="<?= base_url('pembangunan') ?>" 
               style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= empty($selectedYear) && $selectedStatus === 'semua' ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                Semua Kegiatan
            </a>
            <?php foreach ($allYears as $y): ?>
                <a href="<?= base_url('pembangunan?tahun=' . $y['tahun']) ?>" 
                   style="padding: 0.45rem 1.1rem; border-radius: 9999px; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: 0.2s; <?= $selectedYear == $y['tahun'] ? 'background: #10b981; color: #fff;' : 'background: rgba(255,255,255,0.15); color: #fff;' ?>">
                    TA <?= $y['tahun'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Grid Pembangunan -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 1.75rem;">
        <?php if (empty($list)): ?>
            <div style="grid-column: 1 / -1; background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 3rem; text-align: center; color: #64748b;">
                <i data-lucide="hard-hat" style="width: 48px; height: 48px; margin-bottom: 1rem; color: #94a3b8;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #1e293b;">Belum ada kegiatan pembangunan</h3>
                <p>Data pembangunan untuk filter ini belum tersedia.</p>
            </div>
        <?php else: ?>
            <?php foreach ($list as $item): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.04); display: flex; flex-direction: column;">
                    <!-- Foto Kegiatan -->
                    <div style="position: relative; height: 200px; background: #e2e8f0;">
                        <?php 
                            $img = !empty($item['foto_sesudah']) ? $item['foto_sesudah'] : (!empty($item['foto_sebelum']) ? $item['foto_sebelum'] : 'images/berita-peta.webp');
                        ?>
                        <img src="<?= base_url($img) ?>" alt="<?= esc($item['nama_kegiatan']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <span style="position: absolute; top: 12px; right: 12px; padding: 0.35rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; 
                            <?= $item['status'] === 'selesai' ? 'background: #10b981; color: #ffffff;' : ($item['status'] === 'berjalan' ? 'background: #f59e0b; color: #ffffff;' : 'background: #64748b; color: #ffffff;') ?>">
                            <?= ucfirst($item['status']) ?>
                        </span>
                        <span style="position: absolute; bottom: 12px; left: 12px; padding: 0.25rem 0.6rem; border-radius: 6px; background: rgba(0,0,0,0.65); color: #ffffff; font-size: 0.75rem; font-weight: 600;">
                            TA <?= esc($item['tahun']) ?> &bull; <?= esc($item['dusun']) ?>
                        </span>
                    </div>

                    <!-- Detail Body -->
                    <div style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #0b6045; text-transform: uppercase; margin-bottom: 0.25rem;">
                            <?= esc($item['bidang']) ?>
                        </span>
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a; line-height: 1.4; margin-bottom: 0.75rem;">
                            <a href="<?= base_url('pembangunan/' . $item['slug']) ?>" style="color: inherit; text-decoration: none;">
                                <?= esc($item['nama_kegiatan']) ?>
                            </a>
                        </h3>

                        <!-- Info Anggaran & Volume -->
                        <div style="background: #f8fafc; border-radius: 10px; padding: 0.75rem; margin-bottom: 1rem; font-size: 0.82rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                                <span style="color: #64748b;">Pagu Anggaran:</span>
                                <strong style="color: #059669;">Rp <?= number_format($item['anggaran'], 0, ',', '.') ?></strong>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.3rem;">
                                <span style="color: #64748b;">Sumber Dana:</span>
                                <span style="color: #1e293b; font-weight: 600;"><?= esc($item['sumber_dana']) ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span style="color: #64748b;">Volume:</span>
                                <span style="color: #1e293b; font-weight: 600;"><?= esc($item['volume']) ?></span>
                            </div>
                        </div>

                        <!-- Progres Bar -->
                        <div style="margin-bottom: 1rem;">
                            <div style="display: flex; justify-content: space-between; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.3rem;">
                                <span style="color: #475569;">Progres Fisik</span>
                                <span style="color: <?= $item['progres'] >= 100 ? '#059669' : '#d97706' ?>; font-weight: 800;"><?= $item['progres'] ?>%</span>
                            </div>
                            <div style="width: 100%; height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                                <div style="width: <?= min(100, $item['progres']) ?>%; height: 100%; background: <?= $item['progres'] >= 100 ? '#10b981' : '#f59e0b' ?>;"></div>
                            </div>
                        </div>

                        <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin-bottom: 1rem; flex-grow: 1;">
                            <?= character_limiter(strip_tags($item['manfaat']), 90) ?>
                        </p>

                        <a href="<?= base_url('pembangunan/' . $item['slug']) ?>" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.4rem; padding: 0.6rem; border-radius: 8px; background: #0b6045; color: #ffffff; font-weight: 600; font-size: 0.85rem; text-decoration: none;">
                            Lihat Detail Proyek <i data-lucide="arrow-right" style="width: 15px; height: 15px;"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
