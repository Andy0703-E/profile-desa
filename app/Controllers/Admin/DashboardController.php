<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PengajuanModel;
use App\Models\PengaduanModel;
use App\Models\UmkmModel;
use App\Models\WisataModel;
use App\Models\AgendaModel;
use App\Models\PembangunanModel;

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

        // Optional check if PengajuanModel exists (handle older DB structure)
        $countPengajuan = 0;
        $latestPengajuan = [];
        if (class_exists('App\Models\PengajuanModel')) {
            $pengajuanModel = new PengajuanModel();
            $countPengajuan = $pengajuanModel->countAll();
            // $latestPengajuan = $pengajuanModel->orderBy('id', 'DESC')->limit(5)->findAll();
        }

        $data = [
            'title'             => 'Dashboard Administrator',
            'countBerita'       => $beritaModel->countAll(),
            'countPengaduan'    => $pengaduanModel->countAll(),
            'countUmkm'         => $umkmModel->countAll(),
            'countWisata'       => $wisataModel->countAll(),
            'countAgenda'       => $agendaModel->countAll(),
            'countPembangunan'  => $pembangunanModel->countAll(),
            'latestAduan'       => $pengaduanModel->orderBy('id', 'DESC')->limit(5)->findAll(),
            'latestBerita'      => $beritaModel->getLatest(5),
        ];

        return view('admin/dashboard/index', $data);
    }
}
