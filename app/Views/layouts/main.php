<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Website Resmi') ?> - <?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?></title>
    <meta name="description" content="<?= esc($metaDescription ?? 'Website Resmi Desa Batu Bingkung, Kecamatan Pasimarannu, Kabupaten Kepulauan Selayar, Sulawesi Selatan.') ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= esc($title ?? 'Desa Batu Bingkung') ?> - Website Resmi">
    <meta property="og:description" content="<?= esc($metaDescription ?? 'Website Resmi Desa Batu Bingkung, Kabupaten Kepulauan Selayar.') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:image" content="<?= base_url('images/background.webp') ?>">
    <link rel="icon" type="image/webp" href="<?= base_url(!empty($desa['logo']) ? $desa['logo'] : 'images/logo.webp') ?>">

    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Leaflet Map Assets -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        :root {
            --brand-green: #0b4632;      /* Official Digides Forest Green */
            --brand-dark: #062b1e;
            --brand-mint: #e6f7f2;
            --brand-teal: #108c69;
            --primary: #0b6045;
            --primary-hover: #074732;
            --accent-green: #10b981;
            --text-dark: #1e293b;
            --text-slate: #334155;
            --text-muted: #64748b;
            --bg-page: #f8fafc;
            --card-bg: #ffffff;
            --border-card: #e2e8f0;
            --radius-xl: 18px;
            --radius-lg: 12px;
            --radius-md: 8px;
            --radius-pill: 9999px;
            --shadow-card: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 12px 30px -4px rgba(11, 70, 50, 0.12);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        html {
            overflow-x: hidden;
            width: 100%;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            width: 100%;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            box-sizing: border-box;
        }

        /* 1. TOP NAVBAR (Digides Official Deep Green) */
        .digides-header {
            background-color: var(--brand-green);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 72px;
            padding: 0.5rem 0;
            gap: 1rem;
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: #ffffff;
            flex-shrink: 0;
        }

        .brand-logo-img {
            width: 44px;
            height: 44px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.15;
            letter-spacing: -0.01em;
            white-space: nowrap;
        }

        .brand-regency {
            font-size: 0.75rem;
            color: #a7f3d0;
            font-weight: 500;
            white-space: nowrap;
        }

        /* Desktop Menu Links */
        .desktop-nav {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 0.85rem;
            margin: 0;
            padding: 0;
            flex-wrap: nowrap;
        }

        .desktop-nav a {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.86rem;
            font-weight: 600;
            padding: 0.35rem 0.2rem;
            transition: color 0.15s ease;
            position: relative;
            white-space: nowrap;
            text-align: center;
            display: inline-block;
        }

        .desktop-nav a:hover,
        .desktop-nav li.active a {
            color: #ffffff;
            font-weight: 700;
        }

        .desktop-nav li.active a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #34d399;
            border-radius: 2px;
        }

        .desktop-nav-search-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff !important;
            transition: background 0.2s;
        }

        .desktop-nav-search-btn:hover {
            background: rgba(255, 255, 255, 0.22);
        }

        .mobile-hamburger-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: #ffffff;
            flex-shrink: 0;
        }

        @media (max-width: 1240px) and (min-width: 992px) {
            .desktop-nav {
                gap: 0.55rem;
            }
            .desktop-nav a {
                font-size: 0.8rem;
                padding: 0.25rem 0.1rem;
            }
            .brand-name {
                font-size: 1.05rem;
            }
            .brand-regency {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 991px) {
            .desktop-nav {
                display: none;
            }
            .mobile-hamburger-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        /* Mobile Drawer Menu */
        .mobile-drawer-menu {
            display: none;
            background: #083425;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 1.25rem 1.5rem;
        }

        .mobile-drawer-menu.open {
            display: block;
        }

        .mobile-drawer-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .mobile-drawer-list a {
            display: block;
            padding: 0.65rem 0.75rem;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            transition: background 0.15s;
        }

        .mobile-drawer-list a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Main Workspace */
        main {
            flex: 1;
            position: relative;
        }

        /* Digides Official Dark Teal Footer */
        .digides-footer {
            background-color: var(--brand-dark);
            color: #94a3b8;
            font-size: 0.88rem;
            margin-top: 3.5rem;
        }

        .footer-top {
            padding: 3.5rem 0 2.5rem;
        }

        .footer-grid-desktop {
            display: grid;
            grid-template-columns: 1.4fr 1.1fr 1fr 1.1fr;
            gap: 2.5rem;
        }

        .footer-logo-brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            margin-bottom: 1rem;
        }

        .footer-logo-brand img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .footer-brand-title {
            color: #ffffff;
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .footer-info-text {
            color: #cbd5e1;
            font-size: 0.84rem;
            line-height: 1.6;
        }

        .footer-col-title {
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
        }

        .footer-link-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
        }

        .footer-link-list a {
            color: #cbd5e1;
            font-size: 0.85rem;
            transition: color 0.15s ease;
        }

        .footer-link-list a:hover {
            color: #34d399;
        }

        /* Mobile Accordion Footer (matches [Image 2]) */
        .footer-mobile-view {
            display: none;
        }

        .footer-mobile-brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .footer-accordion {
            border-top: 1px solid rgba(255, 255, 255, 0.12);
        }

        .accordion-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            background: none;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            text-align: left;
        }

        .accordion-btn i.arrow {
            transition: transform 0.2s ease;
        }

        .accordion-btn.active i.arrow {
            transform: rotate(180deg);
        }

        .accordion-content {
            display: none;
            padding: 0.75rem 0 1.25rem;
            color: #cbd5e1;
            font-size: 0.85rem;
        }

        .accordion-content.open {
            display: block;
        }

        .footer-bottom-bar {
            background-color: #031c13;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.25rem 0;
            text-align: center;
            font-size: 0.82rem;
            color: #94a3b8;
        }

        /* Mobile Bottom Floating Nav (Exact 4 Tabs in [Image 2]) */
        .mobile-bottom-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.08);
            z-index: 999;
            padding-bottom: env(safe-area-inset-bottom);
        }

        .mobile-bottom-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            height: 100%;
            max-width: 480px;
            margin: 0 auto;
            align-items: center;
        }

        .mobile-bottom-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #64748b;
            font-size: 0.72rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .mobile-bottom-item i {
            width: 20px;
            height: 20px;
            margin-bottom: 2px;
        }

        .mobile-bottom-item:hover,
        .mobile-bottom-item.active {
            color: #0b6045;
        }

        @media (max-width: 900px) {
            .desktop-nav {
                display: none;
            }
            .mobile-hamburger-btn {
                display: block;
            }
            .footer-grid-desktop {
                display: none;
            }
            .footer-mobile-view {
                display: block;
            }
            body {
                padding-bottom: 74px; /* Clearance for bottom nav */
            }
            .mobile-bottom-nav {
                display: block;
            }
        }

        /* Global Mobile Utilities for clean responsive layouts */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            .mobile-stack-1col {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }
            .mobile-form-1col {
                grid-template-columns: 1fr !important;
                gap: 0.75rem !important;
            }
            .mobile-organogram-scroll {
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch;
                padding: 1rem 0.5rem !important;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Top Navbar Header -->
    <header class="digides-header">
        <div class="container header-inner">
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url(!empty($desa['logo']) ? $desa['logo'] : 'images/logo.webp') ?>" alt="Logo <?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?>" class="brand-logo-img">
                <div class="brand-text">
                    <span class="brand-name"><?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?></span>
                    <span class="brand-regency"><?= esc($desa['kabupaten'] ?? 'Kabupaten Kepulauan Selayar') ?></span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <ul class="desktop-nav">
                <li class="<?= uri_string() === '' || uri_string() === '/' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>">Beranda</a>
                </li>
                <li class="<?= strpos(uri_string(), 'profil') === 0 || strpos(uri_string(), 'pemerintahan') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('profil') ?>">Profil</a>
                </li>
                <li class="<?= strpos(uri_string(), 'data-desa') === 0 || strpos(uri_string(), 'statistik') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('data-desa') ?>">Statistik</a>
                </li>
                <li class="<?= strpos(uri_string(), 'transparansi') === 0 || strpos(uri_string(), 'apbdes') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('transparansi') ?>">APBDes</a>
                </li>
                <li class="<?= strpos(uri_string(), 'peta') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('peta') ?>">Peta</a>
                </li>
                <li class="<?= strpos(uri_string(), 'pembangunan') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('pembangunan') ?>">Pembangunan</a>
                </li>
                <li class="<?= strpos(uri_string(), 'potensi') === 0 || strpos(uri_string(), 'umkm') === 0 || strpos(uri_string(), 'wisata') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('potensi') ?>">UMKM & Wisata</a>
                </li>
                <li class="<?= strpos(uri_string(), 'berita') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('berita') ?>">Berita</a>
                </li>
                <li class="<?= strpos(uri_string(), 'layanan') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('layanan') ?>">Layanan</a>
                </li>
                <li class="<?= strpos(uri_string(), 'pengaduan') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('pengaduan') ?>">Pengaduan</a>
                </li>
                <li class="<?= strpos(uri_string(), 'dokumen') === 0 ? 'active' : '' ?>">
                    <a href="<?= base_url('dokumen') ?>">Dokumen</a>
                </li>
                <li>
                    <a href="<?= base_url('search') ?>" title="Cari di website" class="desktop-nav-search-btn">
                        <i data-lucide="search" style="width: 16px; height: 16px;"></i>
                    </a>
                </li>
            </ul>

            <!-- Mobile Hamburger Button -->
            <button type="button" class="mobile-hamburger-btn" id="mobileHamburgerBtn" aria-label="Buka Menu">
                <i data-lucide="menu" style="width: 26px; height: 26px;"></i>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div class="mobile-drawer-menu" id="mobileDrawerMenu">
            <ul class="mobile-drawer-list">
                <li><a href="<?= base_url() ?>">Beranda</a></li>
                <li><a href="<?= base_url('profil') ?>">Profil Desa</a></li>
                <li><a href="<?= base_url('data-desa') ?>">Statistik Kependudukan</a></li>
                <li><a href="<?= base_url('transparansi') ?>">Transparansi APBDes</a></li>
                <li><a href="<?= base_url('peta') ?>">Peta Geospasial</a></li>
                <li><a href="<?= base_url('pembangunan') ?>">Pembangunan Desa</a></li>
                <li><a href="<?= base_url('potensi') ?>">UMKM & Wisata</a></li>
                <li><a href="<?= base_url('berita') ?>">Berita Desa</a></li>
                <li><a href="<?= base_url('agenda') ?>">Agenda Kegiatan</a></li>
                <li><a href="<?= base_url('galeri') ?>">Galeri Foto & Video</a></li>
                <li><a href="<?= base_url('dokumen') ?>">Dokumen Publik</a></li>
                <li><a href="<?= base_url('layanan') ?>">Layanan Persuratan</a></li>
                <li><a href="<?= base_url('pengaduan') ?>">Pengaduan Warga</a></li>
                <li><a href="<?= base_url('search') ?>">Pencarian Global</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content Workspace -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer (Official Digides Layout) -->
    <footer class="digides-footer">
        <div class="footer-top">
            <div class="container">
                <!-- Desktop 4-Column View ([Image 1]) -->
                <div class="footer-grid-desktop">
                    <!-- Column 1: Info Desa -->
                    <div>
                        <div class="footer-logo-brand">
                            <img src="<?= base_url(!empty($desa['logo']) ? $desa['logo'] : 'images/logo.webp') ?>" alt="Logo Selayar">
                            <div>
                                <div class="footer-brand-title">Pemerintah <?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?></div>
                            </div>
                        </div>
                        <div class="footer-info-text">
                            <?= esc($desa['alamat'] ?? 'Jl. Poros Batu Bingkung No. 1, Kec. Pasimarannu') ?><br>
                            <?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?>, <?= esc($desa['kecamatan'] ?? 'Kecamatan Pasimarannu') ?>, <?= esc($desa['kabupaten'] ?? 'Kabupaten Kepulauan Selayar') ?><br>
                            Provinsi <?= esc($desa['provinsi'] ?? 'Sulawesi Selatan') ?>, <?= esc($desa['kode_pos'] ?? '92861') ?><br><br>
                            Kode Wilayah: <span style="color: #6ee7b7; font-weight: 600;">73.01.05.2006</span>
                        </div>
                    </div>

                    <!-- Column 2: Hubungi Kami -->
                    <div>
                        <h4 class="footer-col-title">Hubungi Kami</h4>
                        <div class="footer-info-text">
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <i data-lucide="phone" style="width: 16px; height: 16px; color: #34d399;"></i>
                                <span><?= esc($desa['telepon'] ?? '082194882000') ?></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="mail" style="width: 16px; height: 16px; color: #34d399;"></i>
                                <span><?= esc($desa['email'] ?? 'kantor@batubingkung.desa.id') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3: Nomor Telepon Penting -->
                    <div>
                        <h4 class="footer-col-title">Nomor Telepon Penting</h4>
                        <div class="footer-info-text">
                            <div>Polsek Pasimarannu: (0414) 21110</div>
                            <div style="margin-top: 0.4rem;">Puskesmas Pasimarannu: (0414) 21118</div>
                            <div style="margin-top: 0.4rem;">Damkar Kepulauan Selayar: 113</div>
                        </div>
                    </div>

                    <!-- Column 4: Jelajahi -->
                    <div>
                        <h4 class="footer-col-title">Tautan Cepat</h4>
                        <ul class="footer-link-list">
                            <li><a href="<?= base_url('transparansi') ?>">Transparansi APBDes</a></li>
                            <li><a href="<?= base_url('peta') ?>">Peta Geospasial Wilayah</a></li>
                            <li><a href="<?= base_url('pembangunan') ?>">Informasi Pembangunan</a></li>
                            <li><a href="<?= base_url('potensi') ?>">Lapak UMKM & Wisata</a></li>
                            <li><a href="<?= base_url('dokumen') ?>">Dokumen & Peraturan Desa</a></li>
                            <li><a href="<?= base_url('pengaduan') ?>">Pengaduan Masyarakat</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Accordion View ([Image 2]) -->
                <div class="footer-mobile-view">
                    <div class="footer-mobile-brand">
                        <img src="<?= base_url(!empty($desa['logo']) ? $desa['logo'] : 'images/logo.webp') ?>" alt="Logo Selayar" style="width: 44px; height: 44px; object-fit: contain;">
                        <div>
                            <div style="color: #ffffff; font-weight: 700; font-size: 1.05rem;"><?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?></div>
                            <div style="color: #a7f3d0; font-size: 0.78rem;"><?= esc($desa['kecamatan'] ?? 'Kecamatan Pasimarannu') ?>, <?= esc($desa['kabupaten'] ?? 'Kabupaten Kepulauan Selayar') ?>, Provinsi <?= esc($desa['provinsi'] ?? 'Sulawesi Selatan') ?></div>
                        </div>
                    </div>

                    <div class="footer-accordion">
                        <!-- Accordion 1: Kunjungan -->
                        <button type="button" class="accordion-btn">
                            <span style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="globe" style="width: 17px; height: 17px; color: #34d399;"></i>
                                <span>Kunjungan Website</span>
                            </span>
                            <i data-lucide="chevron-down" class="arrow" style="width: 16px; height: 16px;"></i>
                        </button>
                        <div class="accordion-content">
                            Hari Ini: <strong>27</strong> | Kemarin: <strong>140</strong> | Total: <strong>24.890</strong>
                        </div>

                        <!-- Accordion 2: Kontak Desa -->
                        <button type="button" class="accordion-btn">
                            <span style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="phone" style="width: 17px; height: 17px; color: #34d399;"></i>
                                <span>Kontak Desa</span>
                            </span>
                            <i data-lucide="chevron-down" class="arrow" style="width: 16px; height: 16px;"></i>
                        </button>
                        <div class="accordion-content">
                            Telepon: <?= esc($desa['telepon'] ?? '082194882000') ?><br>
                            Email: <?= esc($desa['email'] ?? 'kantor@batubingkung.desa.id') ?>
                        </div>

                        <!-- Accordion 3: Nomor Telepon Penting -->
                        <button type="button" class="accordion-btn">
                            <span style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="shield-alert" style="width: 17px; height: 17px; color: #34d399;"></i>
                                <span>Nomor Telepon Penting</span>
                            </span>
                            <i data-lucide="chevron-down" class="arrow" style="width: 16px; height: 16px;"></i>
                        </button>
                        <div class="accordion-content">
                            Polsek Pasimarannu: (0414) 21110<br>
                            Puskesmas Pasimarannu: (0414) 21118
                        </div>

                        <!-- Accordion 4: Sosial Media -->
                        <button type="button" class="accordion-btn">
                            <span style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="share-2" style="width: 17px; height: 17px; color: #34d399;"></i>
                                <span>Sosial Media</span>
                            </span>
                            <i data-lucide="chevron-down" class="arrow" style="width: 16px; height: 16px;"></i>
                        </button>
                        <div class="accordion-content">
                            Facebook & Instagram Pemerintah <?= esc($desa['nama_desa'] ?? 'Desa Batu Bingkung') ?>
                        </div>

                        <!-- Accordion 5: Jelajahi -->
                        <button type="button" class="accordion-btn">
                            <span style="display: flex; align-items: center; gap: 0.5rem;">
                                <i data-lucide="link" style="width: 17px; height: 17px; color: #34d399;"></i>
                                <span>Jelajahi</span>
                            </span>
                            <i data-lucide="chevron-down" class="arrow" style="width: 16px; height: 16px;"></i>
                        </button>
                        <div class="accordion-content">
                            <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.4rem;">
                                <li><a href="https://kemendesa.go.id" style="color: #6ee7b7;">Website Kemendesa</a></li>
                                <li><a href="https://kemendagri.go.id" style="color: #6ee7b7;">Website Kemendagri</a></li>
                                <li><a href="https://cekdptonline.kpu.go.id" style="color: #6ee7b7;">Cek DPT Online</a></li>
                                <li><a href="https://cekbansos.kemensos.go.id" style="color: #6ee7b7;">Cek Bansos Kemensos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-bar">
            <div class="container">
                &copy; <?= date('Y') ?> Powered by <strong>PT Digital Desa Indonesia</strong>
            </div>
        </div>
    </footer>

    <!-- Mobile Bottom Floating Navigation Bar ([Image 2]) -->
    <nav class="mobile-bottom-nav" aria-label="Navigasi Bawah">
        <div class="mobile-bottom-grid">
            <a href="<?= base_url() ?>" class="mobile-bottom-item <?= uri_string() === '' || uri_string() === '/' ? 'active' : '' ?>">
                <i data-lucide="home"></i>
                <span>Beranda</span>
            </a>
            <a href="<?= base_url('pengaduan') ?>" class="mobile-bottom-item <?= strpos(uri_string(), 'pengaduan') === 0 ? 'active' : '' ?>">
                <i data-lucide="message-square"></i>
                <span>Pengaduan</span>
            </a>
            <a href="<?= base_url('berita') ?>" class="mobile-bottom-item <?= strpos(uri_string(), 'berita') === 0 ? 'active' : '' ?>">
                <i data-lucide="newspaper"></i>
                <span>Berita</span>
            </a>
            <a href="<?= base_url('potensi') ?>" class="mobile-bottom-item <?= strpos(uri_string(), 'potensi') === 0 ? 'active' : '' ?>">
                <i data-lucide="shopping-bag"></i>
                <span>Belanja</span>
            </a>
        </div>
    </nav>

    <script>
        lucide.createIcons();

        // Mobile Hamburger Drawer Toggle
        const hamburgerBtn = document.getElementById('mobileHamburgerBtn');
        const drawerMenu = document.getElementById('mobileDrawerMenu');
        if (hamburgerBtn && drawerMenu) {
            hamburgerBtn.addEventListener('click', () => {
                drawerMenu.classList.toggle('open');
            });
        }

        // Mobile Footer Accordions
        document.querySelectorAll('.accordion-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.toggle('active');
                const content = btn.nextElementSibling;
                if (content) {
                    content.classList.toggle('open');
                }
            });
        });
    </script>
</body>
</html>
