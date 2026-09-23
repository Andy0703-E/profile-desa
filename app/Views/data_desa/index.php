<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section style="background: linear-gradient(135deg, #0b4632 0%, #062b1e 100%); padding: 3rem 0 3.5rem; color: #ffffff;">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: #a7f3d0; margin-bottom: 0.75rem;">
            <a href="<?= base_url() ?>" style="color: inherit; text-decoration: none;">Beranda</a>
            <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
            <span style="color: #ffffff; font-weight: 600;">Statistik Desa</span>
        </div>
        <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.02em;">Data Kependudukan & Demografi</h1>
        <p style="color: #d1fae5; max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
            Penyajian data statistik kependudukan, piramida kelompok umur, tingkat pendidikan, mata pencaharian, agama, status perkawinan, serta sebaran dusun di <?= esc($desa['nama_desa']) ?>.
        </p>
    </div>
</section>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- 4 Card Statistik Utama -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; margin-bottom: 2.5rem;">
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center;">
                <i data-lucide="users" style="width: 26px; height: 26px;"></i>
            </div>
            <div>
                <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase;">Total Penduduk</div>
                <div style="font-size: 1.6rem; font-weight: 800; color: #0f172a; line-height: 1.2;"><?= number_format($desa['jumlah_penduduk'] ?? 2348, 0, ',', '.') ?> <span style="font-size: 0.85rem; font-weight: 600; color: #64748b;">Jiwa</span></div>
            </div>
        </div>

        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center;">
                <i data-lucide="home" style="width: 26px; height: 26px;"></i>
            </div>
            <div>
                <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase;">Kepala Keluarga (KK)</div>
                <div style="font-size: 1.6rem; font-weight: 800; color: #0f172a; line-height: 1.2;"><?= number_format($desa['jumlah_kk'] ?? 712, 0, ',', '.') ?> <span style="font-size: 0.85rem; font-weight: 600; color: #64748b;">KK</span></div>
            </div>
        </div>

        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                <i data-lucide="map" style="width: 26px; height: 26px;"></i>
            </div>
            <div>
                <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase;">Luas Wilayah</div>
                <div style="font-size: 1.6rem; font-weight: 800; color: #0f172a; line-height: 1.2;"><?= esc($desa['luas_wilayah'] ?? '14,8 km²') ?></div>
            </div>
        </div>

        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center;">
                <i data-lucide="compass" style="width: 26px; height: 26px;"></i>
            </div>
            <div>
                <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase;">Jumlah Dusun</div>
                <div style="font-size: 1.6rem; font-weight: 800; color: #0f172a; line-height: 1.2;"><?= count($dusunList) ?> <span style="font-size: 0.85rem; font-weight: 600; color: #64748b;">Wilayah</span></div>
            </div>
        </div>
    </div>

    <!-- Grid Visualisasi Data Statistik -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
        
        <!-- 1. Statistik Berdasarkan Umur -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
                <i data-lucide="bar-chart-2" style="width: 20px; height: 20px; color: #0b6045;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a;">Penduduk Berdasarkan Kelompok Umur</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                <?php foreach ($byAge as $row): 
                    $pct = round(($row['jumlah'] / 2348) * 100, 1);
                ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.25rem;">
                            <span style="font-weight: 600; color: #334155;"><?= esc($row['label']) ?></span>
                            <span style="color: #64748b;"><strong><?= number_format($row['jumlah'], 0, ',', '.') ?></strong> Jiwa (<?= $pct ?>%)</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                            <div style="width: <?= $pct ?>%; height: 100%; background: #10b981;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 2. Statistik Berdasarkan Pekerjaan -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
                <i data-lucide="briefcase" style="width: 20px; height: 20px; color: #0b6045;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a;">Mata Pencaharian & Pekerjaan Utama</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                <?php foreach ($byJob as $row): 
                    $pct = round(($row['jumlah'] / 2348) * 100, 1);
                ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.25rem;">
                            <span style="font-weight: 600; color: #334155;"><?= esc($row['label']) ?></span>
                            <span style="color: #64748b;"><strong><?= number_format($row['jumlah'], 0, ',', '.') ?></strong> Jiwa (<?= $pct ?>%)</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                            <div style="width: <?= $pct ?>%; height: 100%; background: #0b6045;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 3. Statistik Berdasarkan Pendidikan -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
                <i data-lucide="graduation-cap" style="width: 20px; height: 20px; color: #0b6045;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a;">Tingkat Pendidikan Masyarakat</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                <?php foreach ($byEducation as $row): 
                    $pct = round(($row['jumlah'] / 2348) * 100, 1);
                ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.25rem;">
                            <span style="font-weight: 600; color: #334155;"><?= esc($row['label']) ?></span>
                            <span style="color: #64748b;"><strong><?= number_format($row['jumlah'], 0, ',', '.') ?></strong> Jiwa (<?= $pct ?>%)</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                            <div style="width: <?= $pct ?>%; height: 100%; background: #3b82f6;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 4. Sebaran Penduduk per Dusun -->
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.25rem;">
                <i data-lucide="map-pin" style="width: 20px; height: 20px; color: #0b6045;"></i>
                <h3 style="font-size: 1.15rem; font-weight: 700; color: #0f172a;">Sebaran Penduduk Wilayah Dusun</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                <?php foreach ($byDusun as $row): 
                    $pct = round(($row['jumlah'] / 2348) * 100, 1);
                ?>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.25rem;">
                            <span style="font-weight: 600; color: #334155;"><?= esc($row['label']) ?></span>
                            <span style="color: #64748b;"><strong><?= number_format($row['jumlah'], 0, ',', '.') ?></strong> Jiwa (<?= $pct ?>%)</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                            <div style="width: <?= $pct ?>%; height: 100%; background: #f59e0b;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
