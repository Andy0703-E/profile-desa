<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\ProfilDesaModel;
use App\Models\DusunModel;
use App\Models\PemerintahanModel;

class ProfilController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $profilModel = new ProfilDesaModel();
        $dusunModel = new DusunModel();
        $pemerintahanModel = new PemerintahanModel();

        $kades = $pemerintahanModel->where('status', 'aktif')
                                   ->like('jabatan', 'Kepala Desa')
                                   ->first();

        $data = [
            'title'       => 'Profil Lengkap Desa Batu Bingkung',
            'desa'        => $desaModel->getInfo(),
            'profil'      => $profilModel->getProfil(),
            'dusunList'   => $dusunModel->findAll(),
            'kades'       => $kades,
            'perangkat'   => $pemerintahanModel->getActive(),
        ];

        return view('profil/index', $data);
    }
}
