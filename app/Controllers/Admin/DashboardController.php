<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PengaduanModel;
use App\Models\UmkmModel;
use App\Models\WisataModel;
use App\Models\AgendaModel;
use App\Models\PembangunanModel;
use App\Models\PetaTitikModel;
use App\Models\PemerintahanModel;
use App\Models\ApbdesModel;
use App\Models\KontakModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();
        $pengaduanModel = new PengaduanModel();
        $umkmModel = new UmkmModel();
        $wisataModel = new WisataModel();
        $agendaModel = new AgendaModel();
        $pembangunanModel = new PembangunanModel();
        $petaModel = new PetaTitikModel();
        $aparaturModel = new PemerintahanModel();
        $apbdesModel = new ApbdesModel();
        $kontakModel = new KontakModel();

        // APBDes summary
        $latestApbdes = $apbdesModel->orderBy('tahun', 'DESC')->first();

        // Pengaduan status count
        $countPendingAduan = $pengaduanModel->where('status', 'diajukan')->countAllResults();
        $countProsesAduan  = $pengaduanModel->where('status', 'diproses')->countAllResults();
        $countSelesaiAduan = $pengaduanModel->where('status', 'selesai')->countAllResults();

        $data = [
            'title'             => 'Dashboard Administrator',
            'countBerita'       => $beritaModel->countAll(),
            'countPengaduan'    => $pengaduanModel->countAll(),
            'countPendingAduan' => $countPendingAduan,
            'countProsesAduan'  => $countProsesAduan,
            'countSelesaiAduan' => $countSelesaiAduan,
            'countPesan'        => $kontakModel->countAll(),
            'latestPesan'       => $kontakModel->orderBy('created_at', 'DESC')->limit(5)->findAll(),
            'countUmkm'         => $umkmModel->countAll(),
            'countWisata'       => $wisataModel->countAll(),
            'countAgenda'       => $agendaModel->countAll(),
            'countPembangunan'  => $pembangunanModel->countAll(),
            'countPeta'         => $petaModel->countAll(),
            'countAparatur'     => $aparaturModel->countAll(),
            'latestApbdes'      => $latestApbdes,
            'latestAduan'       => $pengaduanModel->orderBy('id', 'DESC')->limit(5)->findAll(),
            'latestBerita'      => $beritaModel->getLatest(5),
            'latestAgenda'      => $agendaModel->orderBy('tanggal_mulai', 'DESC')->limit(4)->findAll(),
        ];

        return view('admin/dashboard/index', $data);
    }
}

