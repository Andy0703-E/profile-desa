<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\DataPendudukModel;
use App\Models\DataStatistikModel;
use App\Models\DusunModel;

class DataDesaController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $pendudukModel = new DataPendudukModel();
        $statistikModel = new DataStatistikModel();
        $dusunModel = new DusunModel();

        $allData = $pendudukModel->orderBy('urutan', 'ASC')->findAll();

        $byGender = [];
        $byAge = [];
        $byEducation = [];
        $byJob = [];
        $byReligion = [];
        $byMarriage = [];
        $byDusun = [];

        foreach ($allData as $row) {
            $kat = strtolower($row['kategori']);
            if (strpos($kat, 'kelamin') !== false) {
                $byGender[] = $row;
            } elseif (strpos($kat, 'umur') !== false) {
                $byAge[] = $row;
            } elseif (strpos($kat, 'pendidikan') !== false) {
                $byEducation[] = $row;
            } elseif (strpos($kat, 'pekerjaan') !== false) {
                $byJob[] = $row;
            } elseif (strpos($kat, 'agama') !== false) {
                $byReligion[] = $row;
            } elseif (strpos($kat, 'perkawinan') !== false) {
                $byMarriage[] = $row;
            } elseif (strpos($kat, 'dusun') !== false) {
                $byDusun[] = $row;
            }
        }

        $data = [
            'title'       => 'Statistik & Data Demografi Desa',
            'desa'        => $desaModel->getInfo(),
            'statistik'   => $statistikModel->orderBy('urutan', 'ASC')->findAll(),
            'byGender'    => $byGender,
            'byAge'       => $byAge,
            'byEducation' => $byEducation,
            'byJob'       => $byJob,
            'byReligion'  => $byReligion,
            'byMarriage'  => $byMarriage,
            'byDusun'     => $byDusun,
            'dusunList'   => $dusunModel->findAll(),
        ];

        return view('data_desa/index', $data);
    }
}
