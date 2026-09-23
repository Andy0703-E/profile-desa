<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\LayananModel;
use App\Models\PengajuanLayananModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $layananModel = new LayananModel();
        $pengajuanModel = new PengajuanLayananModel();

        $data = [
            'title'             => 'Dashboard Administrator',
            'countBerita'       => $beritaModel->countAll(),
            'countGaleri'       => $galeriModel->countAll(),
            'countLayanan'      => $layananModel->countAll(),
            'countPengajuan'    => $pengajuanModel->countAll(),
            'latestPengajuan'   => $pengajuanModel->getAllWithLayanan(5),
            'latestBerita'      => $beritaModel->getLatest(5),
        ];

        return view('admin/dashboard/index', $data);
    }
}
