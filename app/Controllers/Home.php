<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\LayananModel;
use App\Models\DataStatistikModel;
use App\Models\PotensiDesaModel;
use App\Models\PemerintahanModel;
use App\Models\DataPendudukModel;
use App\Models\ProfilDesaModel;
use App\Models\PengumumanModel;
use App\Models\ApbdesModel;
use App\Models\AgendaModel;
use App\Models\PembangunanModel;
use App\Models\UmkmModel;
use App\Models\WisataModel;
use App\Models\ProgramUnggulanModel;
use App\Models\DusunModel;

class Home extends BaseController
{
    public function index(): string
    {
        $desaModel = new DesaModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $layananModel = new LayananModel();
        $pemerintahanModel = new PemerintahanModel();
        $pendudukModel = new DataPendudukModel();
        $profilDesaModel = new ProfilDesaModel();
        $pengumumanModel = new PengumumanModel();
        $apbdesModel = new ApbdesModel();
        $agendaModel = new AgendaModel();
        $pembangunanModel = new PembangunanModel();
        $umkmModel = new UmkmModel();
        $wisataModel = new WisataModel();
        $programModel = new ProgramUnggulanModel();
        $dusunModel = new DusunModel();

        $desa = $desaModel->getInfo() ?? [
            'nama_desa' => 'Desa Batu Bingkung',
            'kecamatan' => 'Kecamatan Pasimarannu',
            'kabupaten' => 'Kabupaten Kepulauan Selayar',
            'provinsi'  => 'Sulawesi Selatan',
            'kode_pos'  => '92861',
            'luas_wilayah' => '14,8 km²',
            'jumlah_penduduk' => 2348,
            'jumlah_kk' => 712,
            'koordinat_lat' => '-7.3683708',
            'koordinat_lng' => '121.1260432',
            'slogan' => 'Bersama membangun desa yang maju, mandiri dan sejahtera untuk masa depan yang lebih baik.',
            'motto' => 'Bersatu, Maju, Sejahtera',
        ];

        // Ambil Kepala Desa
        $kades = $pemerintahanModel->where('status', 'aktif')
                                   ->like('jabatan', 'Kepala Desa')
                                   ->first();

        // APBDes terbaru
        $latestApbdes = $apbdesModel->getLatest();

        // Dusun count
        $dusunCount = $dusunModel->countAllResults();
        if ($dusunCount === 0) {
            $dusunCount = 4;
        }

        // UMKM count
        $umkmCount = $umkmModel->where('status', 'aktif')->countAllResults();

        // Wisata count
        $wisataCount = $wisataModel->where('status', 'aktif')->countAllResults();

        $data = [
            'title'             => 'Beranda Resmi',
            'desa'              => $desa,
            'kades'             => $kades,
            'beritaList'        => $beritaModel->getLatest(4),
            'galeriList'        => $galeriModel->getPublishedWithCategory(6),
            'layananList'       => $layananModel->getActive(),
            'umkmList'          => $umkmModel->getActive(),
            'wisataList'        => $wisataModel->getActive(),
            'pembangunanList'   => $pembangunanModel->orderBy('tahun', 'DESC')->limit(3)->findAll(),
            'agendaList'        => $agendaModel->getUpcoming(3),
            'programList'       => $programModel->getActive(),
            'dusunList'         => $dusunModel->findAll(),
            'pemerintahanList'  => $pemerintahanModel->getActive(),
            'profilDesa'        => $profilDesaModel->getProfil(),
            'pengumumanList'    => $pengumumanModel->where('status', 'aktif')->orderBy('tanggal', 'DESC')->findAll(4),
            'apbdes'            => $latestApbdes,
            'dusunCount'        => $dusunCount,
            'umkmCount'         => $umkmCount,
            'wisataCount'       => $wisataCount,
        ];

        return view('home/index', $data);
    }
}
