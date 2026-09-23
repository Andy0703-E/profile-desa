<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?> - Desa Batu Bingkung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --primary: #15803d;
            --primary-dark: #14532d;
            --primary-light: #f0fdf4;
            --sidebar-bg: #0f172a;
            --sidebar-text: #94a3b8;
            --sidebar-active: #15803d;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --radius-md: 10px;
            --radius-lg: 16px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
            transition: all 0.3s ease;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-logo-small {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        .brand-logo-small img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
        }

        .brand-subname {
            font-size: 0.7rem;
            color: #64748b;
        }

        .sidebar-menu {
            list-style: none;
            padding: 1rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            flex: 1;
        }

        .menu-header {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #475569;
            padding: 0.75rem 0.75rem 0.25rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.85rem;
            border-radius: var(--radius-md);
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .menu-link:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #ffffff;
        }

        .menu-link.active {
            background: var(--sidebar-active);
            color: #ffffff;
        }

        .menu-badge {
            margin-left: auto;
            background: #ef4444;
            color: #ffffff;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 9999px;
        }

        /* Main Workspace */
        .workspace {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            padding: 0.85rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-main);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            background: #f1f5f9;
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
        }

        .btn-view-site {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.825rem;
            font-weight: 600;
            color: #15803d;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-view-site:hover {
            background: #15803d;
            color: #ffffff;
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.825rem;
            font-weight: 600;
            color: #ef4444;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: #ef4444;
            color: #ffffff;
        }

        .content-area {
            padding: 2rem;
            flex: 1;
        }

        /* Flash Alerts */
        .alert {
            padding: 0.85rem 1.25rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Common Admin Components */
        .card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
        }

        .btn-primary-admin {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #15803d;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.55rem 1.15rem;
            border-radius: var(--radius-md);
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-primary-admin:hover {
            background: #166534;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .admin-table th {
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
            text-align: left;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
        }

        .admin-table td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: #f8fafc;
        }

        .action-btns {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-sm-edit {
            color: #0284c7;
            background: #e0f2fe;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn-sm-delete {
            color: #dc2626;
            background: #fee2e2;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.35rem;
        }

        .form-control {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--border);
            font-size: 0.9rem;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
        }

        /* Mobile Sidebar toggle */
        .btn-mobile-sidebar {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: #334155;
        }

        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                left: -260px;
                z-index: 1000;
            }
            .sidebar.show {
                left: 0;
            }
            .btn-mobile-sidebar {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="brand-logo-small">
                <img src="<?= base_url('images/logo.webp') ?>" alt="Logo">
            </div>
            <div>
                <div class="brand-name">Desa Batu Bingkung</div>
                <div class="brand-subname">Admin Control Panel</div>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Menu Utama</li>
            <li>
                <a href="<?= base_url('admin') ?>" class="menu-link <?= uri_string() === 'admin' ? 'active' : '' ?>">
                    <i data-lucide="layout-dashboard" style="width: 18px; height: 18px;"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Informasi & Profil</li>
            <li>
                <a href="<?= base_url('admin/profil') ?>" class="menu-link <?= strpos(uri_string(), 'admin/profil') === 0 ? 'active' : '' ?>">
                    <i data-lucide="info" style="width: 18px; height: 18px;"></i>
                    <span>Profil Desa</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pemerintahan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pemerintahan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="users" style="width: 18px; height: 18px;"></i>
                    <span>Pemerintahan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/dusun') ?>" class="menu-link <?= strpos(uri_string(), 'admin/dusun') === 0 ? 'active' : '' ?>">
                    <i data-lucide="layers" style="width: 18px; height: 18px;"></i>
                    <span>Data Dusun</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/program-unggulan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/program-unggulan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="star" style="width: 18px; height: 18px;"></i>
                    <span>Program Unggulan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/data-desa') ?>" class="menu-link <?= strpos(uri_string(), 'admin/data-desa') === 0 ? 'active' : '' ?>">
                    <i data-lucide="bar-chart-2" style="width: 18px; height: 18px;"></i>
                    <span>Statistik & Penduduk</span>
                </a>
            </li>

            <li class="menu-header">Transparansi & Peta</li>
            <li>
                <a href="<?= base_url('admin/apbdes') ?>" class="menu-link <?= strpos(uri_string(), 'admin/apbdes') === 0 ? 'active' : '' ?>">
                    <i data-lucide="pie-chart" style="width: 18px; height: 18px;"></i>
                    <span>APBDes Keuangan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pembangunan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pembangunan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="hard-hat" style="width: 18px; height: 18px;"></i>
                    <span>Pembangunan Desa</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/peta') ?>" class="menu-link <?= strpos(uri_string(), 'admin/peta') === 0 ? 'active' : '' ?>">
                    <i data-lucide="map-pin" style="width: 18px; height: 18px;"></i>
                    <span>Peta Geospasial</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/dokumen') ?>" class="menu-link <?= strpos(uri_string(), 'admin/dokumen') === 0 ? 'active' : '' ?>">
                    <i data-lucide="file-check" style="width: 18px; height: 18px;"></i>
                    <span>Dokumen Publik</span>
                </a>
            </li>

            <li class="menu-header">Ekonomi & Wisata</li>
            <li>
                <a href="<?= base_url('admin/umkm') ?>" class="menu-link <?= strpos(uri_string(), 'admin/umkm') === 0 ? 'active' : '' ?>">
                    <i data-lucide="shopping-bag" style="width: 18px; height: 18px;"></i>
                    <span>Katalog UMKM</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/wisata') ?>" class="menu-link <?= strpos(uri_string(), 'admin/wisata') === 0 ? 'active' : '' ?>">
                    <i data-lucide="palmtree" style="width: 18px; height: 18px;"></i>
                    <span>Destinasi Wisata</span>
                </a>
            </li>

            <li class="menu-header">Publikasi & Galeri</li>
            <li>
                <a href="<?= base_url('admin/berita') ?>" class="menu-link <?= strpos(uri_string(), 'admin/berita') === 0 ? 'active' : '' ?>">
                    <i data-lucide="newspaper" style="width: 18px; height: 18px;"></i>
                    <span>Berita & Kabar</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pengumuman') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pengumuman') === 0 ? 'active' : '' ?>">
                    <i data-lucide="megaphone" style="width: 18px; height: 18px;"></i>
                    <span>Pengumuman</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/agenda') ?>" class="menu-link <?= strpos(uri_string(), 'admin/agenda') === 0 ? 'active' : '' ?>">
                    <i data-lucide="calendar" style="width: 18px; height: 18px;"></i>
                    <span>Agenda Desa</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/galeri') ?>" class="menu-link <?= strpos(uri_string(), 'admin/galeri') === 0 ? 'active' : '' ?>">
                    <i data-lucide="image" style="width: 18px; height: 18px;"></i>
                    <span>Galeri Foto</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/video') ?>" class="menu-link <?= strpos(uri_string(), 'admin/video') === 0 ? 'active' : '' ?>">
                    <i data-lucide="video" style="width: 18px; height: 18px;"></i>
                    <span>Video Dokumentasi</span>
                </a>
            </li>

            <li class="menu-header">Layanan & Aspirasi</li>
            <li>
                <a href="<?= base_url('admin/layanan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/layanan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="file-text" style="width: 18px; height: 18px;"></i>
                    <span>Layanan Surat</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pengajuan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pengajuan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="inbox" style="width: 18px; height: 18px;"></i>
                    <span>Permohonan Surat</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pengaduan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pengaduan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="message-square-plus" style="width: 18px; height: 18px;"></i>
                    <span>Pengaduan Warga</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/kontak') ?>" class="menu-link <?= strpos(uri_string(), 'admin/kontak') === 0 ? 'active' : '' ?>">
                    <i data-lucide="message-square" style="width: 18px; height: 18px;"></i>
                    <span>Pesan Masuk</span>
                </a>
            </li>

            <li class="menu-header">Konfigurasi</li>
            <li>
                <a href="<?= base_url('admin/pengaturan') ?>" class="menu-link <?= strpos(uri_string(), 'admin/pengaturan') === 0 ? 'active' : '' ?>">
                    <i data-lucide="settings" style="width: 18px; height: 18px;"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/users') ?>" class="menu-link <?= strpos(uri_string(), 'admin/users') === 0 ? 'active' : '' ?>">
                    <i data-lucide="shield" style="width: 18px; height: 18px;"></i>
                    <span>Pengguna Admin</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Workspace -->
    <div class="workspace">
        <header class="topbar">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <button type="button" class="btn-mobile-sidebar" id="toggleSidebarBtn">
                    <i data-lucide="menu" style="width: 22px; height: 22px;"></i>
                </button>
                <h1 class="topbar-title"><?= esc($title ?? 'Dashboard') ?></h1>
            </div>

            <div class="topbar-actions">
                <a href="<?= base_url() ?>" target="_blank" class="btn-view-site">
                    <i data-lucide="external-link" style="width: 14px; height: 14px;"></i>
                    <span>Lihat Website</span>
                </a>

                <div class="user-pill">
                    <i data-lucide="user" style="width: 15px; height: 15px; color: #15803d;"></i>
                    <span><?= esc(session()->get('userName') ?? 'Admin') ?></span>
                </div>

                <a href="<?= base_url('auth/logout') ?>" class="btn-logout" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                    <i data-lucide="log-out" style="width: 14px; height: 14px;"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </header>

        <main class="content-area">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <i data-lucide="check-circle-2" style="width: 18px; height: 18px;"></i>
                    <div><?= esc(session()->getFlashdata('success')) ?></div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-error">
                    <i data-lucide="alert-circle" style="width: 18px; height: 18px;"></i>
                    <div><?= esc(session()->getFlashdata('error')) ?></div>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
        lucide.createIcons();

        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
        const adminSidebar = document.getElementById('adminSidebar');
        if (toggleSidebarBtn && adminSidebar) {
            toggleSidebarBtn.addEventListener('click', () => {
                adminSidebar.classList.toggle('show');
            });
        }
    </script>
</body>
</html>
