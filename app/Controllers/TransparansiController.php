<?php

namespace App\Controllers;

use App\Models\ApbdesModel;
use App\Models\ApbdesRincianModel;
use App\Models\DesaModel;

class TransparansiController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $apbdesModel = new ApbdesModel();
        $rincianModel = new ApbdesRincianModel();

        $tahun = $this->request->getGet('tahun');
        if ($tahun) {
            $apbdes = $apbdesModel->where('tahun', $tahun)->orderBy('id', 'DESC')->first();
        } else {
            $apbdes = $apbdesModel->getLatest();
        }

        $rincian = [];
        $pendapatan = [];
        $belanja = [];
        $pembiayaan = [];

        if ($apbdes) {
            $rincian = $rincianModel->getByApbdes($apbdes['id']);
            foreach ($rincian as $r) {
                if ($r['tipe'] === 'pendapatan') {
                    $pendapatan[] = $r;
                } elseif ($r['tipe'] === 'belanja') {
                    $belanja[] = $r;
                } elseif ($r['tipe'] === 'pembiayaan') {
                    $pembiayaan[] = $r;
                }
            }
        }

        $allYears = $apbdesModel->select('tahun')->distinct()->orderBy('tahun', 'DESC')->findAll();

        $data = [
            'title'       => 'Transparansi Keuangan (APBDes)',
            'desa'        => $desaModel->getInfo(),
            'apbdes'      => $apbdes,
            'pendapatan'  => $pendapatan,
            'belanja'     => $belanja,
            'pembiayaan'  => $pembiayaan,
            'allYears'    => $allYears,
            'selectedYear'=> $apbdes['tahun'] ?? date('Y'),
        ];

        return view('transparansi/index', $data);
    }
}
