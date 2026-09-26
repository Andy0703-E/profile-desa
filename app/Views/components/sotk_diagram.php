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
            Pemerintah Desa Batu Bingkung
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar</p>
    </div>

    <div class="sotk-tree-wrapper">
        <!-- SVG Connecting Lines -->
        <svg width="1040" height="560" style="position: absolute; top: 0; left: 0; z-index: 1; pointer-events: none;">
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

        <!-- 1. KEPALA DESA -->
        <div class="sotk-card" style="left: 410px; top: 0; width: 220px; height: 66px;">
            <div class="sotk-card-photo" style="width: 52px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kepala Desa">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.72rem; padding: 4px;">KEPALA DESA</div>
                <div class="sotk-card-name" style="font-size: 0.78rem;">Ahmad Nur, S.Sos.</div>
            </div>
        </div>

        <!-- 2. SEKRETARIS DESA -->
        <div class="sotk-card" style="left: 675px; top: 116px; width: 210px; height: 64px;">
            <div class="sotk-card-photo" style="width: 50px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Sekdes">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.68rem; padding: 4px;">SEKRETARIS DESA</div>
                <div class="sotk-card-name" style="font-size: 0.74rem;">Kaharuddin, S.Pd.</div>
            </div>
        </div>

        <!-- 3. KEPALA SEKSI (KASI) - Sayap Kiri -->
        <!-- Kasi 1: Pemerintahan -->
        <div class="sotk-card" style="left: 10px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Pemerintahan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI PEMERINTAHAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Syamsir, S.E.</div>
            </div>
        </div>

        <!-- Kasi 2: Kesejahteraan -->
        <div class="sotk-card" style="left: 183px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Kesra">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI KESEJAHTERAAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Rosmini, A.Md.</div>
            </div>
        </div>

        <!-- Kasi 3: Pelayanan -->
        <div class="sotk-card" style="left: 356px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Pelayanan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KASI PELAYANAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Hasbullah</div>
            </div>
        </div>

        <!-- 4. KEPALA URUSAN (KAUR) - Sayap Kanan -->
        <!-- Kaur 1: Keuangan -->
        <div class="sotk-card" style="left: 530px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur Keuangan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR KEUANGAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Fitriani, S.Ak.</div>
            </div>
        </div>

        <!-- Kaur 2: Perencanaan -->
        <div class="sotk-card" style="left: 703px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur Perencanaan">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR PERENCANAAN</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Andi Arman</div>
            </div>
        </div>

        <!-- Kaur 3: Umum & TU -->
        <div class="sotk-card" style="left: 876px; top: 224px; width: 154px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur TU">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">KAUR UMUM &amp; TU</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Nurhayati</div>
            </div>
        </div>

        <!-- 5. STAFF (5 Orang) -->
        <div class="sotk-card" style="left: 58px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Muh. Ridwan, S.Sos</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 246px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Putri Handayani, ST</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 435px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">M. Wahyudi, S.Kom</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 623px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Listiawati, S.M</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 812px; top: 346px; width: 170px; height: 62px;">
            <div class="sotk-card-photo" style="width: 42px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.62rem; padding: 3px 2px;">STAFF</div>
                <div class="sotk-card-name" style="font-size: 0.68rem;">Kartini</div>
            </div>
        </div>

        <!-- 6. KEPALA DUSUN (4 Dusun) -->
        <div class="sotk-card" style="left: 89px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.65rem; padding: 3px 2px;">KADUS PESISIR</div>
                <div class="sotk-card-name" style="font-size: 0.72rem;">Baharuddin</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 311px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.65rem; padding: 3px 2px;">KADUS DARAT MAKMUR</div>
                <div class="sotk-card-name" style="font-size: 0.72rem;">Samsul Alam</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 535px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.65rem; padding: 3px 2px;">KADUS KARANGAN TIMUR</div>
                <div class="sotk-card-name" style="font-size: 0.72rem;">Syarifuddin</div>
            </div>
        </div>

        <div class="sotk-card" style="left: 757px; top: 466px; width: 194px; height: 64px;">
            <div class="sotk-card-photo" style="width: 46px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.65rem; padding: 3px 2px;">KADUS BONE TANJUNG</div>
                <div class="sotk-card-name" style="font-size: 0.72rem;">Muh. Idris</div>
            </div>
        </div>
    </div>
</div>

