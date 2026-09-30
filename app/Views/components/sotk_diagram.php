<?php
// Helper mapping for SOTK Diagram
$aparaturModel = new \App\Models\PemerintahanModel();
$allAparatur = $aparaturModel->where('status', 'aktif')->orderBy('urutan', 'ASC')->findAll();

$aparaturByRole = [];
$kadusList = [];
$staffList = [];

foreach ($allAparatur as $ap) {
    $j = strtolower($ap['jabatan']);
    if ((strpos($j, 'bpd') !== false || strpos($j, 'permusyawaratan') !== false) && !isset($aparaturByRole['bpd'])) {
        $aparaturByRole['bpd'] = $ap;
    } elseif (strpos($j, 'kepala desa') !== false && !isset($aparaturByRole['kades'])) {
        $aparaturByRole['kades'] = $ap;
    } elseif (strpos($j, 'sekretaris desa') !== false && !isset($aparaturByRole['sekdes'])) {
        $aparaturByRole['sekdes'] = $ap;
    } elseif (strpos($j, 'kasi pemerintahan') !== false || strpos($j, 'seksi pemerintahan') !== false) {
        $aparaturByRole['kasi_pem'] = $ap;
    } elseif (strpos($j, 'kesejahteraan') !== false || strpos($j, 'kesra') !== false) {
        $aparaturByRole['kasi_kesra'] = $ap;
    } elseif (strpos($j, 'pelayanan') !== false) {
        $aparaturByRole['kasi_pelayanan'] = $ap;
    } elseif (strpos($j, 'keuangan') !== false || strpos($j, 'bendahara') !== false) {
        $aparaturByRole['kaur_keu'] = $ap;
    } elseif (strpos($j, 'perencanaan') !== false) {
        $aparaturByRole['kaur_ren'] = $ap;
    } elseif (strpos($j, 'tata usaha') !== false || strpos($j, 'tu') !== false || strpos($j, 'umum') !== false) {
        $aparaturByRole['kaur_tu'] = $ap;
    } elseif (strpos($j, 'dusun') !== false || strpos($j, 'kadus') !== false) {
        $kadusList[] = $ap;
    } elseif (strpos($j, 'staff') !== false || strpos($j, 'staf') !== false) {
        $staffList[] = $ap;
    }
}

// Fallback helper photo
function getAparaturPhoto($item, $defaultAlt = '') {
    if (!empty($item['foto']) && file_exists(FCPATH . $item['foto'])) {
        return base_url(esc($item['foto']));
    }
    return base_url('images/avatar-pejabat.svg');
}
?>
<!-- SOTK Diagram Container (Standard Permendagri No. 84/2015) -->
<style>
    .sotk-container {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        padding: 2.5rem 1.5rem;
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        position: relative;
        overflow-x: auto;
    }
    .sotk-tree-wrapper {
        min-width: 1040px;
        width: 1040px;
        margin: 0 auto;
        position: relative;
        height: 560px;
    }

    /* Card Box Styles */
    .sotk-card {
        display: flex;
        background: #ffffff;
        border: 1.5px solid #1e293b;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        border-radius: 4px;
        overflow: hidden;
        box-sizing: border-box;
        position: absolute;
        z-index: 5;
    }
    .sotk-card-photo {
        background: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        flex-shrink: 0;
        overflow: hidden;
        border-right: 1.5px solid #1e293b;
    }
    .sotk-card-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .sotk-card-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
    }
    .sotk-card-role {
        background: #0f2b5c;
        color: #ffffff;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        line-height: 1.15;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        border-bottom: 1.5px solid #1e293b;
    }
    .sotk-card-name {
        flex: 1;
        background: #ffffff;
        color: #0f172a;
        font-weight: 800;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2px 4px;
        text-transform: uppercase;
        line-height: 1.15;
    }
</style>

<div class="sotk-container">
    <div style="text-align: center; margin-bottom: 2rem;">
        <span style="font-size: 0.75rem; font-weight: 800; color: #059669; text-transform: uppercase; letter-spacing: 0.08em; background: #ecfdf5; padding: 0.25rem 0.75rem; border-radius: 9999px;">
            Bagan Struktur Organisasi
        </span>
        <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 0.4rem;">
            Pemerintah &amp; BPD Desa Batu Bingkung
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar</p>
        <div style="display: flex; justify-content: center; gap: 1.5rem; margin-top: 0.6rem; font-size: 0.75rem; color: #64748b; flex-wrap: wrap;">
            <span style="display: inline-flex; align-items: center; gap: 6px;">
                <span style="display: inline-block; width: 22px; height: 0; border-top: 2px dashed #059669;"></span>
                <strong>Garis Koordinasi / Kemitraan:</strong> BPD &amp; Kepala Desa
            </span>
            <span style="display: inline-flex; align-items: center; gap: 6px;">
                <span style="display: inline-block; width: 22px; height: 2.5px; background: #1e293b;"></span>
                <strong>Garis Komando / Hirarki:</strong> Eksekutif Pemerintah Desa
            </span>
        </div>
    </div>

    <div class="sotk-tree-wrapper">
        <!-- SVG Connecting Lines -->
        <svg width="1040" height="560" style="position: absolute; top: 0; left: 0; z-index: 1; pointer-events: none;">
            <!-- 0. BPD to Kades (Garis Kemitraan / Koordinasi Horizontal Putus-putus) -->
            <line x1="320" y1="33" x2="410" y2="33" stroke="#059669" stroke-width="2.5" stroke-dasharray="6,4" />
            <text x="365" y="24" text-anchor="middle" font-size="8.5" font-weight="800" fill="#059669" letter-spacing="0.5">KOORDINASI</text>

            <!-- 1. Kades to junction -->
            <path d="M 520 66 L 520 96" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 2. Kades junction to Sekdes -->
            <path d="M 520 96 L 780 96 L 780 116" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 3. Central spine going all the way down to Staff -->
            <path d="M 520 96 L 520 346" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 4. Sekdes to Kaur junction & drops -->
            <path d="M 780 180 L 780 206" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 607 206 L 953 206" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 607 206 L 607 224" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 780 206 L 780 224" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 953 206 L 953 224" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 5. Kasi junction branch from central spine & drops -->
            <path d="M 520 190 L 260 190 L 260 206" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 87 206 L 433 206" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 87 206 L 87 224" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 260 206 L 260 224" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 433 206 L 433 224" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 6. Staff crossbar & drops -->
            <path d="M 143 330 L 897 330" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 143 330 L 143 346" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 331 330 L 331 346" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 520 330 L 520 346" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 708 330 L 708 346" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 897 330 L 897 346" stroke="#1e293b" stroke-width="2.5" fill="none" />

            <!-- 7. Staff to Kadus spine & crossbar & drops -->
            <path d="M 520 408 L 520 450" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 186 450 L 854 450" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 186 450 L 186 466" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 408 450 L 408 466" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 632 450 L 632 466" stroke="#1e293b" stroke-width="2.5" fill="none" />
            <path d="M 854 450 L 854 466" stroke="#1e293b" stroke-width="2.5" fill="none" />
        </svg>

        <!-- 0. BPD (Badan Permusyawaratan Desa) - Mitra Sejajar Kepala Desa -->
        <?php $bpd = $aparaturByRole['bpd'] ?? null; ?>
        <div class="sotk-card" style="left: 100px; top: 0; width: 220px; height: 66px; border: 1.5px solid #059669;">
            <div class="sotk-card-photo" style="width: 52px; background: #059669; border-right: 1.5px solid #059669;">
                <img src="<?= getAparaturPhoto($bpd) ?>" alt="Ketua BPD">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.66rem; padding: 4px; background: #059669; border-bottom: 1.5px solid #059669;">KETUA BPD</div>
                <div class="sotk-card-name" style="font-size: 0.78rem;"><?= esc($bpd['nama'] ?? 'Joyo T') ?></div>
            </div>
        </div>

        <!-- 1. KEPALA DESA -->
        <?php $kd = $aparaturByRole['kades'] ?? null; ?>
        <div class="sotk-card" style="left: 410px; top: 0; width: 220px; height: 66px;">
            <div class="sotk-card-photo" style="width: 52px;">
                <img src="<?= getAparaturPhoto($kd) ?>" alt="Kepala Desa">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.72rem; padding: 4px;">KEPALA DESA</div>
                <div class="sotk-card-name" style="font-size: 0.78rem;"><?= esc($kd['nama'] ?? 'Abdullah, S.Sos') ?></div>
            </div>
        </div>

        <!-- 2. SEKRETARIS DESA -->
        <?php $sk = $aparaturByRole['sekdes'] ?? null; ?>
        <div class="sotk-card" style="left: 675px; top: 116px; width: 210px; height: 64px;">
            <div class="sotk-card-photo" style="width: 50px;">
                <img src="<?= getAparaturPhoto($sk) ?>" alt="Sekdes">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.68rem; padding: 4px;">SEKRETARIS DESA</div>
                <div class="sotk-card-name" style="font-size: 0.74rem;"><?= esc($sk['nama'] ?? 'Harjono, S.Pi') ?></div>
            </div>
        </div>

        <!-- 3. KEPALA SEKSI (KASI) - Sayap Kiri -->
        <!-- Kasi 1: Pemerintahan -->
        <?php $kPem = $aparaturByRole['kasi_pem'] ?? null; ?>
        <div class="sotk-card" style="left: 10px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kPem) ?>" alt="Kasi Pemerintahan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI PEMERINTAHAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kPem['nama'] ?? 'Askar, S.E') ?></div>
            </div>
        </div>

        <!-- Kasi 2: Kesejahteraan -->
        <?php $kKes = $aparaturByRole['kasi_kesra'] ?? null; ?>
        <div class="sotk-card" style="left: 183px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kKes) ?>" alt="Kasi Kesra">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI KESEJAHTERAAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kKes['nama'] ?? 'Baharuddin') ?></div>
            </div>
        </div>

        <!-- Kasi 3: Pelayanan -->
        <?php $kPel = $aparaturByRole['kasi_pelayanan'] ?? null; ?>
        <div class="sotk-card" style="left: 356px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kPel) ?>" alt="Kasi Pelayanan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI PELAYANAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kPel['nama'] ?? 'Murniati') ?></div>
            </div>
        </div>

        <!-- 4. KEPALA URUSAN (KAUR) - Sayap Kanan -->
        <!-- Kaur 1: Keuangan -->
        <?php $kKeu = $aparaturByRole['kaur_keu'] ?? null; ?>
        <div class="sotk-card" style="left: 530px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kKeu) ?>" alt="Kaur Keuangan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR KEUANGAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kKeu['nama'] ?? 'Airi') ?></div>
            </div>
        </div>

        <!-- Kaur 2: Perencanaan -->
        <?php $kRen = $aparaturByRole['kaur_ren'] ?? null; ?>
        <div class="sotk-card" style="left: 703px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kRen) ?>" alt="Kaur Perencanaan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR PERENCANAAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kRen['nama'] ?? 'Dewi Aprillah') ?></div>
            </div>
        </div>

        <!-- Kaur 3: Umum & TU -->
        <?php $kTu = $aparaturByRole['kaur_tu'] ?? null; ?>
        <div class="sotk-card" style="left: 876px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($kTu) ?>" alt="Kaur TU">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR UMUM &amp; TU</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($kTu['nama'] ?? 'Muh.Yusuf') ?></div>
            </div>
        </div>

        <!-- 5. STAFF (5 Orang) -->
        <?php $st1 = $staffList[0] ?? null; ?>
        <div class="sotk-card" style="left: 58px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($st1) ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($st1['nama'] ?? 'Muh. Ridwan, S.Sos') ?></div>
            </div>
        </div>

        <?php $st2 = $staffList[1] ?? null; ?>
        <div class="sotk-card" style="left: 246px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($st2) ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($st2['nama'] ?? 'Putri Handayani, ST') ?></div>
            </div>
        </div>

        <?php $st3 = $staffList[2] ?? null; ?>
        <div class="sotk-card" style="left: 435px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($st3) ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($st3['nama'] ?? 'M. Wahyudi, S.Kom') ?></div>
            </div>
        </div>

        <?php $st4 = $staffList[3] ?? null; ?>
        <div class="sotk-card" style="left: 623px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($st4) ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($st4['nama'] ?? 'Listiawati, S.M') ?></div>
            </div>
        </div>

        <?php $st5 = $staffList[4] ?? null; ?>
        <div class="sotk-card" style="left: 812px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= getAparaturPhoto($st5) ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;"><?= esc($st5['nama'] ?? 'Kartini') ?></div>
            </div>
        </div>

        <!-- 6. KEPALA DUSUN (4 Dusun Sesuai Data Desa) -->
        <?php $kd1 = $kadusList[0] ?? null; ?>
        <div class="sotk-card" style="left: 89px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= getAparaturPhoto($kd1) ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= !empty($kd1['jabatan']) ? esc(strtoupper(str_replace(['Kepala Dusun ', 'Dusun '], 'KADUS ', $kd1['jabatan']))) : 'KADUS LIMBO UTARA' ?>
                </div>
                <div class="sotk-card-name" style="font-size: 0.72rem;"><?= esc($kd1['nama'] ?? 'Dimansyah') ?></div>
            </div>
        </div>

        <?php $kd2 = $kadusList[1] ?? null; ?>
        <div class="sotk-card" style="left: 311px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= getAparaturPhoto($kd2) ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= !empty($kd2['jabatan']) ? esc(strtoupper(str_replace(['Kepala Dusun ', 'Dusun '], 'KADUS ', $kd2['jabatan']))) : 'KADUS LIMBO SELATAN' ?>
                </div>
                <div class="sotk-card-name" style="font-size: 0.72rem;"><?= esc($kd2['nama'] ?? 'Syahrir, S.Pd.i') ?></div>
            </div>
        </div>

        <?php $kd3 = $kadusList[2] ?? null; ?>
        <div class="sotk-card" style="left: 535px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= getAparaturPhoto($kd3) ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= !empty($kd3['jabatan']) ? esc(strtoupper(str_replace(['Kepala Dusun ', 'Dusun '], 'KADUS ', $kd3['jabatan']))) : 'KADUS BENTENG TIMUR' ?>
                </div>
                <div class="sotk-card-name" style="font-size: 0.72rem;"><?= esc($kd3['nama'] ?? 'Saehuddin') ?></div>
            </div>
        </div>

        <?php $kd4 = $kadusList[3] ?? null; ?>
        <div class="sotk-card" style="left: 757px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= getAparaturPhoto($kd4) ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= !empty($kd4['jabatan']) ? esc(strtoupper(str_replace(['Kepala Dusun ', 'Dusun '], 'KADUS ', $kd4['jabatan']))) : 'KADUS BENTENG BARAT' ?>
                </div>
                <div class="sotk-card-name" style="font-size: 0.72rem;"><?= esc($kd4['nama'] ?? 'Nada cinta') ?></div>
            </div>
        </div>
    </div>
</div>
