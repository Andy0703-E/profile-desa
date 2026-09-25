<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- 1. Hero Section Desa Batu Bingkung -->
<section style="position: relative; background: #0b4632; min-height: 520px; display: flex; align-items: center; overflow: hidden; color: #ffffff;">
    <!-- Background Image dengan Dark Green Overlay -->
    <div style="position: absolute; inset: 0; z-index: 1;">
        <img src="<?= base_url('images/background.webp') ?>" alt="Desa Batu Bingkung" style="width: 100%; height: 100%; object-fit: cover; object-position: center; filter: brightness(0.45);">
    </div>
    <div style="position: absolute; inset: 0; z-index: 2; background: linear-gradient(180deg, rgba(11,70,50,0.65) 0%, rgba(6,43,30,0.88) 100%);"></div>

    <div class="container" style="position: relative; z-index: 3; padding-top: 3.5rem; padding-bottom: 3.5rem;">
        <div style="max-width: 780px;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.35rem 0.85rem; border-radius: 9999px; background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); margin-bottom: 1.25rem;">
                <img src="<?= base_url('images/logo_selayar.png') ?>" alt="Selayar" style="width: 18px; height: 18px; object-fit: contain;">
                <span style="font-size: 0.82rem; font-weight: 700; color: #a7f3d0; letter-spacing: 0.05em; text-transform: uppercase;">
                    <?= esc($desa['kecamatan']) ?> &bull; <?= esc($desa['kabupaten']) ?>
                </span>
            </div>

            <h1 style="font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 800; line-height: 1.15; margin-bottom: 1rem; letter-spacing: -0.02em;">
                Portal Resmi <?= esc($desa['nama_desa']) ?>
            </h1>

            <p style="font-size: clamp(0.95rem, 2vw, 1.15rem); color: #d1fae5; line-height: 1.6; margin-bottom: 2rem;">
                <?= esc($desa['slogan']) ?>
            </p>

            <div style="display: flex; gap: 0.85rem; flex-wrap: wrap;">
                <a href="<?= base_url('pengaduan') ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 9999px; background: #10b981; color: #ffffff; font-weight: 700; font-size: 0.95rem; text-decoration: none; box-shadow: 0 4px 15px rgba(16,185,129,0.4);">
                    <i data-lucide="message-square-plus" style="width: 18px; height: 18px;"></i> Pengaduan Warga
                </a>
                <a href="<?= base_url('transparansi') ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 9999px; background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); color: #ffffff; font-weight: 700; font-size: 0.95rem; text-decoration: none; border: 1px solid rgba(255,255,255,0.25);">
                    <i data-lucide="pie-chart" style="width: 18px; height: 18px;"></i> APBDes TA 2026
                </a>
                <a href="<?= base_url('peta') ?>" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 9999px; background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); color: #ffffff; font-weight: 700; font-size: 0.95rem; text-decoration: none; border: 1px solid rgba(255,255,255,0.25);">
                    <i data-lucide="map-pin" style="width: 18px; height: 18px;"></i> Peta Spasial Desa
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Shortcut Link Layanan Cepat (Floating Cards) -->
<section style="margin-top: -30px; position: relative; z-index: 10;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <a href="<?= base_url('pengaduan') ?>" style="background: #ffffff; padding: 1.25rem 1rem; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: transform 0.2s;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i data-lucide="message-square" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: #0f172a;">Pengaduan</div>
                    <div style="font-size: 0.75rem; color: #64748b;">Aspirasi warga</div>
                </div>
            </a>

            <a href="<?= base_url('transparansi') ?>" style="background: #ffffff; padding: 1.25rem 1rem; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: transform 0.2s;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i data-lucide="wallet" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: #0f172a;">APBDes 2026</div>
                    <div style="font-size: 0.75rem; color: #64748b;">Transparansi kas</div>
                </div>
            </a>

            <a href="<?= base_url('peta') ?>" style="background: #ffffff; padding: 1.25rem 1rem; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: transform 0.2s;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i data-lucide="map-pin" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: #0f172a;">Peta Geospasial</div>
                    <div style="font-size: 0.75rem; color: #64748b;">Lokasi & sarana</div>
                </div>
            </a>

            <a href="<?= base_url('potensi') ?>" style="background: #ffffff; padding: 1.25rem 1rem; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: transform 0.2s;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #fdf2f8; color: #db2777; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i data-lucide="shopping-bag" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: #0f172a;">UMKM & Wisata</div>
                    <div style="font-size: 0.75rem; color: #64748b;">Produk & bahari</div>
                </div>
            </a>

            <a href="<?= base_url('pembangunan') ?>" style="background: #ffffff; padding: 1.25rem 1rem; border-radius: 14px; border: 1px solid #e2e8f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-decoration: none; display: flex; align-items: center; gap: 0.85rem; transition: transform 0.2s;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #f1f5f9; color: #475569; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i data-lucide="hard-hat" style="width: 22px; height: 22px;"></i>
                </div>
                <div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: #0f172a;">Pembangunan</div>
                    <div style="font-size: 0.75rem; color: #64748b;">Proyek fisik desa</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- 3. Sambutan Kepala Desa & Statistik Singkat -->
<section style="padding: 4rem 0 2rem;">
    <div class="container">
        <div class="mobile-stack-1col" style="display: grid; grid-template-columns: 1.2fr 2fr; gap: 2.5rem; align-items: center;">
            <!-- Foto & Profil Singkat Kepala Desa -->
            <div style="background: #ffffff; border-radius: 20px; border: 1px solid #e2e8f0; padding: 2rem; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
                <div style="width: 160px; height: 190px; border-radius: 16px; background: #e2e8f0; margin: 0 auto 1.25rem; overflow: hidden; border: 3px solid #0b6045;">
                    <img src="<?= base_url('images/avatar-pejabat.svg') ?>" alt="Kepala Desa" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.25rem;">
                    <?= esc($kades['nama'] ?? 'Kepala Desa Batu Bingkung') ?>
                </h3>
                <span style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                    Kepala Desa Batu Bingkung
                </span>
                <p style="font-size: 0.78rem; color: #94a3b8; margin-top: 0.35rem;">Kec. Pasimarannu, Kab. Kepulauan Selayar</p>
                <div style="margin-top: 1.25rem;">
                    <a href="<?= base_url('profil') ?>" style="display: inline-block; padding: 0.5rem 1.25rem; border-radius: 9999px; background: #0b6045; color: #fff; font-size: 0.8rem; font-weight: 700; text-decoration: none;">
                        Profil Pemerintahan &rarr;
                    </a>
                </div>
            </div>

            <!-- Sambutan & 5 Statistik Utama Desa -->
            <div>
                <span style="font-size: 0.8rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;">Kata Sambutan</span>
                <h2 style="font-size: clamp(1.4rem, 3.5vw, 2rem); font-weight: 800; color: #0f172a; margin: 0.25rem 0 1rem; letter-spacing: -0.02em;">
                    Mewujudkan Kemandirian & Kesejahteraan Maritim
                </h2>
                <p style="font-size: 0.95rem; color: #475569; line-height: 1.7; margin-bottom: 1.75rem;">
                    Selamat datang di website resmi Desa Batu Bingkung, Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar. Website ini hadir sebagai gerbang informasi terbuka bagi warga dan masyarakat luas untuk mengakses pelayanan persuratan digital, laporan keuangan APBDes, potensi hasil laut dan kopra, serta pengaduan aspirasi pembangunan secara cepat dan transparan.
                </p>

                <!-- Statistik Singkat (Penduduk, KK, Dusun, UMKM, Wisata) -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 1rem;">
                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem; text-align: center;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">Penduduk</span>
                        <div style="font-size: 1.45rem; font-weight: 800; color: #0b6045;"><?= number_format($desa['jumlah_penduduk'] ?? 2348, 0, ',', '.') ?></div>
                        <small style="color: #94a3b8; font-size: 0.7rem;">Jiwa</small>
                    </div>

                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem; text-align: center;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">Keluarga</span>
                        <div style="font-size: 1.45rem; font-weight: 800; color: #0b6045;"><?= number_format($desa['jumlah_kk'] ?? 712, 0, ',', '.') ?></div>
                        <small style="color: #94a3b8; font-size: 0.7rem;">Kepala Keluarga</small>
                    </div>

                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem; text-align: center;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">Wilayah</span>
                        <div style="font-size: 1.45rem; font-weight: 800; color: #0b6045;"><?= $dusunCount ?></div>
                        <small style="color: #94a3b8; font-size: 0.7rem;">Dusun</small>
                    </div>

                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem; text-align: center;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">UMKM</span>
                        <div style="font-size: 1.45rem; font-weight: 800; color: #0b6045;"><?= $umkmCount ?></div>
                        <small style="color: #94a3b8; font-size: 0.7rem;">Usaha Warga</small>
                    </div>

                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1rem; text-align: center;">
                        <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">Wisata</span>
                        <div style="font-size: 1.45rem; font-weight: 800; color: #0b6045;"><?= $wisataCount ?></div>
                        <small style="color: #94a3b8; font-size: 0.7rem;">Destinasi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Program Unggulan Desa -->
<section style="padding: 3rem 0; background: #f1f5f9;">
    <div class="container">
        <div style="text-align: center; max-width: 650px; margin: 0 auto 2.5rem;">
            <span style="font-size: 0.8rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em;">Arah Pembangunan</span>
            <h2 style="font-size: 1.85rem; font-weight: 800; color: #0f172a; margin-top: 0.25rem;">Program Unggulan Desa</h2>
            <p style="font-size: 0.9rem; color: #64748b;">Prioritas program strategis pemerintah desa dalam memajukan kualitas hidup warga.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            <?php foreach ($programList as $pr): ?>
                <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                        <i data-lucide="<?= esc($pr['icon'] ?? 'star') ?>" style="width: 24px; height: 24px;"></i>
                    </div>
                    <h3 style="font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;"><?= esc($pr['judul']) ?></h3>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.6;"><?= esc($pr['ringkasan']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Berita Terbaru & Agenda Kegiatan -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="mobile-stack-1col" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem;">
            <!-- Kolom Kiri: Berita Terbaru -->
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Kabar Terkini</span>
                        <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;">Berita & Informasi Desa</h2>
                    </div>
                    <a href="<?= base_url('berita') ?>" style="font-size: 0.85rem; font-weight: 700; color: #0b6045; text-decoration: none;">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    <?php foreach ($beritaList as $b): ?>
                        <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; overflow: hidden; display: flex; flex-direction: column;">
                            <div style="height: 170px; background: #e2e8f0;">
                                <?php $thumb = !empty($b['thumbnail']) ? $b['thumbnail'] : 'images/berita-meeting.webp'; ?>
                                <img src="<?= base_url($thumb) ?>" alt="<?= esc($b['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                                <span style="font-size: 0.72rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                                    <?= date('d M Y', strtotime($b['created_at'])) ?>
                                </span>
                                <h3 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0.35rem 0 0.5rem; line-height: 1.4;">
                                    <a href="<?= base_url('berita/' . $b['slug']) ?>" style="color: inherit; text-decoration: none;">
                                        <?= esc($b['title']) ?>
                                    </a>
                                </h3>
                                <p style="font-size: 0.82rem; color: #64748b; line-height: 1.5; margin-bottom: 0.75rem; flex-grow: 1;">
                                    <?= character_limiter(strip_tags($b['content']), 85) ?>
                                </p>
                                <a href="<?= base_url('berita/' . $b['slug']) ?>" style="font-size: 0.8rem; font-weight: 700; color: #0b6045; text-decoration: none;">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Kolom Kanan: Agenda Desa -->
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <div>
                        <span style="font-size: 0.75rem; font-weight: 700; color: #059669; text-transform: uppercase;">Jadwal</span>
                        <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a;">Agenda Desa</h2>
                    </div>
                    <a href="<?= base_url('agenda') ?>" style="font-size: 0.85rem; font-weight: 700; color: #0b6045; text-decoration: none;">
                        Semua &rarr;
                    </a>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <?php foreach ($agendaList as $ag): ?>
                        <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 1rem; display: flex; gap: 1rem; align-items: center;">
                            <div style="min-width: 60px; text-align: center; background: #ecfdf5; border-radius: 8px; padding: 0.5rem 0.25rem;">
                                <strong style="display: block; font-size: 1.3rem; font-weight: 800; color: #064e3b; line-height: 1;">
                                    <?= date('d', strtotime($ag['tanggal_mulai'])) ?>
                                </strong>
                                <span style="font-size: 0.68rem; font-weight: 700; color: #059669; text-transform: uppercase;">
                                    <?= date('M', strtotime($ag['tanggal_mulai'])) ?>
                                </span>
                            </div>
                            <div style="flex: 1;">
                                <h4 style="font-size: 0.92rem; font-weight: 700; color: #0f172a; margin-bottom: 0.2rem;"><?= esc($ag['judul']) ?></h4>
                                <div style="font-size: 0.75rem; color: #64748b;">
                                    <i data-lucide="clock" style="width: 12px; height: 12px; display: inline; vertical-align: middle;"></i> <?= esc($ag['jam_mulai']) ?> WITA &bull; <?= esc($ag['lokasi']) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
