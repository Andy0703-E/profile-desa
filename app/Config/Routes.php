<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// 1. Beranda
$routes->get('/', 'Home::index');

// 2. Profil Desa & Pemerintahan
$routes->get('profil', 'ProfilController::index');
$routes->get('profil-desa', 'ProfilController::index');
$routes->get('pemerintahan', 'PemerintahanController::index');

// 3. Statistik Desa & Data Demografi
$routes->get('data-desa', 'DataDesaController::index');
$routes->get('statistik', 'DataDesaController::index');

// 4. Berita & Informasi
$routes->get('berita', 'BeritaController::index');
$routes->get('berita/(:segment)', 'BeritaController::detail/$1');

// 5. Transparansi Keuangan (APBDes)
$routes->get('transparansi', 'TransparansiController::index');
$routes->get('apbdes', 'TransparansiController::index');

// 6. Peta Desa
$routes->get('peta', 'PetaController::index');
$routes->get('peta-desa', 'PetaController::index');

// 7 & 8. Potensi, UMKM & Wisata
$routes->get('potensi', 'PotensiController::index');
$routes->get('umkm', 'PotensiController::index');
$routes->get('umkm/(:num)', 'PotensiController::umkmDetail/$1');
$routes->get('wisata', 'PotensiController::index');
$routes->get('wisata/(:segment)', 'PotensiController::wisataDetail/$1');

// 9. Pembangunan Desa
$routes->get('pembangunan', 'PembangunanController::index');
$routes->get('pembangunan/(:segment)', 'PembangunanController::detail/$1');

// Redirect Layanan & Dokumen ke Beranda
$routes->addRedirect('dokumen', '/');
$routes->addRedirect('layanan', '/');
$routes->addRedirect('layanan/(:any)', '/');

// 10. Pengaduan Warga
$routes->get('pengaduan', 'PengaduanController::index');
$routes->post('pengaduan/kirim', 'PengaduanController::kirim');
$routes->get('pengaduan/status', 'PengaduanController::status');

// 13. Agenda Desa
$routes->get('agenda', 'AgendaController::index');

// 14 & 15. Galeri Foto & Video
$routes->get('galeri', 'GaleriController::index');

// 16. Search Global
$routes->get('search', 'SearchController::index');

// Kontak
$routes->get('kontak', 'KontakController::index');
$routes->post('kontak/kirim', 'KontakController::kirim');

// Authentication
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/attempt', 'AuthController::attemptLogin');
$routes->get('auth/logout', 'AuthController::logout');

// 17. Admin Dashboard & CMS
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');

    // Profil Desa
    $routes->get('profil', 'Admin\ProfilController::index');
    $routes->post('profil/update', 'Admin\ProfilController::update');

    // Pemerintahan
    $routes->get('pemerintahan', 'Admin\PemerintahanController::index');
    $routes->get('pemerintahan/create', 'Admin\PemerintahanController::create');
    $routes->post('pemerintahan/store', 'Admin\PemerintahanController::store');
    $routes->get('pemerintahan/edit/(:num)', 'Admin\PemerintahanController::edit/$1');
    $routes->post('pemerintahan/update/(:num)', 'Admin\PemerintahanController::update/$1');
    $routes->post('pemerintahan/delete/(:num)', 'Admin\PemerintahanController::delete/$1');

    // Berita & Artikel
    $routes->get('berita', 'Admin\BeritaController::index');
    $routes->get('berita/create', 'Admin\BeritaController::create');
    $routes->post('berita/store', 'Admin\BeritaController::store');
    $routes->get('berita/edit/(:num)', 'Admin\BeritaController::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\BeritaController::update/$1');
    $routes->post('berita/delete/(:num)', 'Admin\BeritaController::delete/$1');

    // Pengumuman
    $routes->get('pengumuman', 'Admin\PengumumanController::index');
    $routes->get('pengumuman/create', 'Admin\PengumumanController::create');
    $routes->post('pengumuman/store', 'Admin\PengumumanController::store');
    $routes->get('pengumuman/edit/(:num)', 'Admin\PengumumanController::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'Admin\PengumumanController::update/$1');
    $routes->post('pengumuman/delete/(:num)', 'Admin\PengumumanController::delete/$1');

    // Galeri Foto
    $routes->get('galeri', 'Admin\GaleriController::index');
    $routes->get('galeri/create', 'Admin\GaleriController::create');
    $routes->post('galeri/store', 'Admin\GaleriController::store');
    $routes->get('galeri/edit/(:num)', 'Admin\GaleriController::edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin\GaleriController::update/$1');
    $routes->post('galeri/delete/(:num)', 'Admin\GaleriController::delete/$1');

    // Galeri Video
    $routes->get('video', 'Admin\VideoController::index');
    $routes->get('video/create', 'Admin\VideoController::create');
    $routes->post('video/store', 'Admin\VideoController::store');
    $routes->get('video/edit/(:num)', 'Admin\VideoController::edit/$1');
    $routes->post('video/update/(:num)', 'Admin\VideoController::update/$1');
    $routes->post('video/delete/(:num)', 'Admin\VideoController::delete/$1');

    // APBDes & Transparansi Keuangan
    $routes->get('apbdes', 'Admin\ApbdesController::index');
    $routes->get('apbdes/create', 'Admin\ApbdesController::create');
    $routes->post('apbdes/store', 'Admin\ApbdesController::store');
    $routes->get('apbdes/edit/(:num)', 'Admin\ApbdesController::edit/$1');
    $routes->post('apbdes/update/(:num)', 'Admin\ApbdesController::update/$1');
    $routes->get('apbdes/detail/(:num)', 'Admin\ApbdesController::detail/$1');
    $routes->post('apbdes/store-rincian/(:num)', 'Admin\ApbdesController::storeRincian/$1');
    $routes->post('apbdes/delete-rincian/(:num)', 'Admin\ApbdesController::deleteRincian/$1');
    $routes->post('apbdes/delete/(:num)', 'Admin\ApbdesController::delete/$1');

    // Peta Desa
    $routes->get('peta', 'Admin\PetaController::index');
    $routes->get('peta/create', 'Admin\PetaController::create');
    $routes->post('peta/store', 'Admin\PetaController::store');
    $routes->get('peta/edit/(:num)', 'Admin\PetaController::edit/$1');
    $routes->post('peta/update/(:num)', 'Admin\PetaController::update/$1');
    $routes->post('peta/delete/(:num)', 'Admin\PetaController::delete/$1');

    // UMKM
    $routes->get('umkm', 'Admin\UmkmController::index');
    $routes->get('umkm/create', 'Admin\UmkmController::create');
    $routes->post('umkm/store', 'Admin\UmkmController::store');
    $routes->get('umkm/edit/(:num)', 'Admin\UmkmController::edit/$1');
    $routes->post('umkm/update/(:num)', 'Admin\UmkmController::update/$1');
    $routes->post('umkm/delete/(:num)', 'Admin\UmkmController::delete/$1');

    // Wisata
    $routes->get('wisata', 'Admin\WisataController::index');
    $routes->get('wisata/create', 'Admin\WisataController::create');
    $routes->post('wisata/store', 'Admin\WisataController::store');
    $routes->get('wisata/edit/(:num)', 'Admin\WisataController::edit/$1');
    $routes->post('wisata/update/(:num)', 'Admin\WisataController::update/$1');
    $routes->post('wisata/delete/(:num)', 'Admin\WisataController::delete/$1');

    // Pembangunan
    $routes->get('pembangunan', 'Admin\PembangunanController::index');
    $routes->get('pembangunan/create', 'Admin\PembangunanController::create');
    $routes->post('pembangunan/store', 'Admin\PembangunanController::store');
    $routes->get('pembangunan/edit/(:num)', 'Admin\PembangunanController::edit/$1');
    $routes->post('pembangunan/update/(:num)', 'Admin\PembangunanController::update/$1');
    $routes->post('pembangunan/delete/(:num)', 'Admin\PembangunanController::delete/$1');

    // Dokumen Publik
    $routes->get('dokumen', 'Admin\DokumenController::index');
    $routes->get('dokumen/create', 'Admin\DokumenController::create');
    $routes->post('dokumen/store', 'Admin\DokumenController::store');
    $routes->get('dokumen/edit/(:num)', 'Admin\DokumenController::edit/$1');
    $routes->post('dokumen/update/(:num)', 'Admin\DokumenController::update/$1');
    $routes->post('dokumen/delete/(:num)', 'Admin\DokumenController::delete/$1');

    // Layanan Surat
    $routes->get('layanan', 'Admin\LayananController::index');
    $routes->get('layanan/create', 'Admin\LayananController::create');
    $routes->post('layanan/store', 'Admin\LayananController::store');
    $routes->get('layanan/edit/(:num)', 'Admin\LayananController::edit/$1');
    $routes->post('layanan/update/(:num)', 'Admin\LayananController::update/$1');
    $routes->post('layanan/delete/(:num)', 'Admin\LayananController::delete/$1');

    // Pengajuan Layanan Warga
    $routes->get('pengajuan', 'Admin\PengajuanController::index');
    $routes->get('pengajuan/detail/(:num)', 'Admin\PengajuanController::detail/$1');
    $routes->post('pengajuan/update-status/(:num)', 'Admin\PengajuanController::updateStatus/$1');
    $routes->post('pengajuan/delete/(:num)', 'Admin\PengajuanController::delete/$1');

    // Pengaduan Warga
    $routes->get('pengaduan', 'Admin\PengaduanController::index');
    $routes->get('pengaduan/detail/(:num)', 'Admin\PengaduanController::detail/$1');
    $routes->post('pengaduan/tanggapi/(:num)', 'Admin\PengaduanController::tanggapi/$1');
    $routes->post('pengaduan/delete/(:num)', 'Admin\PengaduanController::delete/$1');

    // Agenda Desa
    $routes->get('agenda', 'Admin\AgendaController::index');
    $routes->get('agenda/create', 'Admin\AgendaController::create');
    $routes->post('agenda/store', 'Admin\AgendaController::store');
    $routes->get('agenda/edit/(:num)', 'Admin\AgendaController::edit/$1');
    $routes->post('agenda/update/(:num)', 'Admin\AgendaController::update/$1');
    $routes->post('agenda/delete/(:num)', 'Admin\AgendaController::delete/$1');

    // Data Dusun
    $routes->get('dusun', 'Admin\DusunController::index');
    $routes->get('dusun/create', 'Admin\DusunController::create');
    $routes->post('dusun/store', 'Admin\DusunController::store');
    $routes->get('dusun/edit/(:num)', 'Admin\DusunController::edit/$1');
    $routes->post('dusun/update/(:num)', 'Admin\DusunController::update/$1');
    $routes->post('dusun/delete/(:num)', 'Admin\DusunController::delete/$1');

    // Program Unggulan
    $routes->get('program-unggulan', 'Admin\ProgramUnggulanController::index');
    $routes->get('program-unggulan/create', 'Admin\ProgramUnggulanController::create');
    $routes->post('program-unggulan/store', 'Admin\ProgramUnggulanController::store');
    $routes->get('program-unggulan/edit/(:num)', 'Admin\ProgramUnggulanController::edit/$1');
    $routes->post('program-unggulan/update/(:num)', 'Admin\ProgramUnggulanController::update/$1');
    $routes->post('program-unggulan/delete/(:num)', 'Admin\ProgramUnggulanController::delete/$1');

    // Penduduk & Data Statistik
    $routes->get('data-desa', 'Admin\DataDesaController::index');
    $routes->post('data-desa/store-penduduk', 'Admin\DataDesaController::storePenduduk');
    $routes->post('data-desa/delete-penduduk/(:num)', 'Admin\DataDesaController::deletePenduduk/$1');
    $routes->post('data-desa/update-statistik', 'Admin\DataDesaController::updateStatistik');

    // Kontak Masuk
    $routes->get('kontak', 'Admin\KontakController::index');
    $routes->post('kontak/delete/(:num)', 'Admin\KontakController::delete/$1');

    // Pengaturan
    $routes->get('pengaturan', 'Admin\PengaturanController::index');
    $routes->post('pengaturan/update', 'Admin\PengaturanController::update');

    // User Management
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/create', 'Admin\UserController::create');
    $routes->post('users/store', 'Admin\UserController::store');
    $routes->get('users/edit/(:num)', 'Admin\UserController::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\UserController::update/$1');
    $routes->post('users/delete/(:num)', 'Admin\UserController::delete/$1');
});
