<!-- SOTK Diagram Container (Standard Permendagri No. 84/2015) -->
<style>
    .sotk-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        padding: 2.5rem 1.5rem;
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        position: relative;
        overflow-x: auto;
    }
    .sotk-tree {
        min-width: 900px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    /* Card Box Styles */
    .sotk-card {
        display: flex;
        background: #ffffff;
        border: 1.5px solid #1e293b;
        box-shadow: 0 3px 8px rgba(0,0,0,0.12);
        border-radius: 4px;
        overflow: hidden;
        width: 195px;
        height: 64px;
        box-sizing: border-box;
        position: relative;
        z-index: 5;
    }
    .sotk-card-photo {
        width: 48px;
        height: 100%;
        background: #dc2626; /* Red badge corner/photo frame */
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
        background: #0f2b5c; /* Dark Navy Blue */
        color: #ffffff;
        font-size: 0.65rem;
        font-weight: 800;
        text-align: center;
        padding: 4px 3px;
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
        font-size: 0.72rem;
        font-weight: 800;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2px 4px;
        text-transform: uppercase;
        line-height: 1.15;
    }

    /* Connecting Lines (2px solid #1e293b) */
    .sotk-line-v {
        width: 2.5px;
        background: #1e293b;
    }
    .sotk-line-h {
        height: 2.5px;
        background: #1e293b;
    }
</style>

<div class="sotk-container">
    <div style="text-align: center; margin-bottom: 2.5rem;">
        <span style="font-size: 0.75rem; font-weight: 800; color: #059669; text-transform: uppercase; letter-spacing: 0.08em; background: #ecfdf5; padding: 0.25rem 0.75rem; border-radius: 9999px;">
            Bagan Struktur Organisasi
        </span>
        <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 0.4rem;">
            Pemerintah Desa Batu Bingkung
        </h2>
        <p style="font-size: 0.85rem; color: #64748b;">Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar</p>
    </div>

    <div class="sotk-tree">
        <!-- 1. KEPALA DESA -->
        <div class="sotk-card" style="width: 220px; height: 68px;">
            <div class="sotk-card-photo" style="width: 54px;">
                <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kepala Desa">
            </div>
            <div class="sotk-card-info">
                <div class="sotk-card-role" style="font-size: 0.72rem; padding: 5px 4px;">KEPALA DESA</div>
                <div class="sotk-card-name" style="font-size: 0.78rem;">Ahmad Nur, S.Sos.</div>
            </div>
        </div>

        <!-- Line directly down from Kepala Desa to Main Branch point -->
        <div class="sotk-line-v" style="height: 30px;"></div>

        <!-- Upper Horizontal Junction: Left goes to central stem down, Right branches to SEKRETARIS DESA -->
        <div style="position: relative; width: 620px; height: 180px;">
            <!-- Center Vertical Spine line all the way through -->
            <div class="sotk-line-v" style="position: absolute; left: 50%; transform: translateX(-50%); top: 0; height: 100%;"></div>

            <!-- Horizontal Arm branching to Right towards SEKRETARIS DESA -->
            <div class="sotk-line-h" style="position: absolute; left: 50%; width: 230px; top: 0;"></div>

            <!-- Vertical drop line down to SEKRETARIS DESA -->
            <div class="sotk-line-v" style="position: absolute; left: calc(50% + 230px); top: 0; height: 26px;"></div>

            <!-- Box SEKRETARIS DESA -->
            <div style="position: absolute; left: calc(50% + 230px); top: 26px; transform: translateX(-50%); z-index: 10;">
                <div class="sotk-card" style="width: 210px; height: 66px;">
                    <div class="sotk-card-photo" style="width: 50px;">
                        <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Sekdes">
                    </div>
                    <div class="sotk-card-info">
                        <div class="sotk-card-role">SEKRETARIS DESA</div>
                        <div class="sotk-card-name">Kaharuddin, S.Pd.</div>
                    </div>
                </div>

                <!-- Vertical line below Sekdes -->
                <div class="sotk-line-v" style="height: 24px; margin: 0 auto;"></div>

                <!-- Horizontal branch for 3 KAUR -->
                <div class="sotk-line-h" style="width: 440px; margin-left: -115px;"></div>

                <!-- 3 Drop lines to 3 KAUR -->
                <div style="width: 440px; margin-left: -115px; display: flex; justify-content: space-between;">
                    <div class="sotk-line-v" style="height: 18px; margin-left: 95px;"></div>
                    <div class="sotk-line-v" style="height: 18px;"></div>
                    <div class="sotk-line-v" style="height: 18px; margin-right: 95px;"></div>
                </div>

                <!-- 3 KAUR BOXES -->
                <div style="width: 630px; margin-left: -210px; display: flex; justify-content: space-between; gap: 10px;">
                    <!-- Kaur 1: Keuangan -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur Keuangan">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KAUR KEUANGAN</div>
                            <div class="sotk-card-name">Fitriani, S.Ak.</div>
                        </div>
                    </div>

                    <!-- Kaur 2: Perencanaan -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur Perencanaan">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KAUR PERENCANAAN</div>
                            <div class="sotk-card-name">Andi Arman</div>
                        </div>
                    </div>

                    <!-- Kaur 3: Umum & TU -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kaur TU">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KAUR UMUM &amp; TU</div>
                            <div class="sotk-card-name">Nurhayati</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left Branch under Central Spine: branches to 3 KEPALA SEKSI (KASI) -->
            <div class="sotk-line-h" style="position: absolute; right: 50%; width: 230px; top: 120px;"></div>
            <div class="sotk-line-v" style="position: absolute; right: calc(50% + 230px); top: 120px; height: 26px;"></div>

            <!-- 3 KASI Horizontal Bar & Drop Lines -->
            <div style="position: absolute; right: calc(50% + 15px); top: 146px; transform: translateX(-50%); width: 440px;">
                <div class="sotk-line-h" style="width: 100%;"></div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="sotk-line-v" style="height: 18px; margin-left: 95px;"></div>
                    <div class="sotk-line-v" style="height: 18px;"></div>
                    <div class="sotk-line-v" style="height: 18px; margin-right: 95px;"></div>
                </div>

                <!-- 3 KASI BOXES -->
                <div style="width: 630px; margin-left: -95px; display: flex; justify-content: space-between; gap: 10px;">
                    <!-- Kasi 1: Pemerintahan -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Pemerintahan">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KASI PEMERINTAHAN</div>
                            <div class="sotk-card-name">Syamsir, S.E.</div>
                        </div>
                    </div>

                    <!-- Kasi 2: Kesejahteraan -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Kesra">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KASI KESEJAHTERAAN</div>
                            <div class="sotk-card-name">Rosmini, A.Md.</div>
                        </div>
                    </div>

                    <!-- Kasi 3: Pelayanan -->
                    <div class="sotk-card">
                        <div class="sotk-card-photo">
                            <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kasi Pelayanan">
                        </div>
                        <div class="sotk-card-info">
                            <div class="sotk-card-role">KASI PELAYANAN</div>
                            <div class="sotk-card-name">Hasbullah</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clearance below Kaur & Kasi level -->
        <div style="height: 140px;"></div>

        <!-- Center line continuing down to STAFF Level -->
        <div class="sotk-line-v" style="height: 35px;"></div>

        <!-- STAFF Horizontal Crossbar (5 Staff) -->
        <div class="sotk-line-h" style="width: 860px;"></div>
        <div style="width: 860px; display: flex; justify-content: space-between; padding: 0 85px;">
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
        </div>

        <!-- 5 STAFF BOXES -->
        <div style="width: 100%; max-width: 900px; display: flex; justify-content: space-between; gap: 8px;">
            <div class="sotk-card" style="width: 172px;">
                <div class="sotk-card-photo" style="width: 44px;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">STAFF</div>
                    <div class="sotk-card-name" style="font-size: 0.68rem;">Muh. Ridwan, S.Sos</div>
                </div>
            </div>

            <div class="sotk-card" style="width: 172px;">
                <div class="sotk-card-photo" style="width: 44px;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">STAFF</div>
                    <div class="sotk-card-name" style="font-size: 0.68rem;">Putri Handayani, ST</div>
                </div>
            </div>

            <div class="sotk-card" style="width: 172px;">
                <div class="sotk-card-photo" style="width: 44px;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">STAFF</div>
                    <div class="sotk-card-name" style="font-size: 0.68rem;">M. Wahyudi, S.Kom</div>
                </div>
            </div>

            <div class="sotk-card" style="width: 172px;">
                <div class="sotk-card-photo" style="width: 44px;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">STAFF</div>
                    <div class="sotk-card-name" style="font-size: 0.68rem;">Listiawati, S.M</div>
                </div>
            </div>

            <div class="sotk-card" style="width: 172px;">
                <div class="sotk-card-photo" style="width: 44px;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Staff">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">STAFF</div>
                    <div class="sotk-card-name" style="font-size: 0.68rem;">Kartini</div>
                </div>
            </div>
        </div>

        <!-- Center line continuing down to KEPALA DUSUN Level -->
        <div class="sotk-line-v" style="height: 35px;"></div>

        <!-- KEPALA DUSUN Horizontal Crossbar (4 Dusun Desa Batu Bingkung) -->
        <div class="sotk-line-h" style="width: 760px;"></div>
        <div style="width: 760px; display: flex; justify-content: space-between; padding: 0 90px;">
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
            <div class="sotk-line-v" style="height: 18px;"></div>
        </div>

        <!-- 4 KEPALA DUSUN BOXES -->
        <div style="width: 100%; max-width: 820px; display: flex; justify-content: space-between; gap: 10px;">
            <div class="sotk-card">
                <div class="sotk-card-photo">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">KADUS PESISIR</div>
                    <div class="sotk-card-name">Baharuddin</div>
                </div>
            </div>

            <div class="sotk-card">
                <div class="sotk-card-photo">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">KADUS DARAT MAKMUR</div>
                    <div class="sotk-card-name">Samsul Alam</div>
                </div>
            </div>

            <div class="sotk-card">
                <div class="sotk-card-photo">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">KADUS KARANGAN TIMUR</div>
                    <div class="sotk-card-name">Syarifuddin</div>
                </div>
            </div>

            <div class="sotk-card">
                <div class="sotk-card-photo">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kadus">
                </div>
                <div class="sotk-card-info">
                    <div class="sotk-card-role">KADUS BONE TANJUNG</div>
                    <div class="sotk-card-name">Muh. Idris</div>
                </div>
            </div>
        </div>

    </div>
</div>
