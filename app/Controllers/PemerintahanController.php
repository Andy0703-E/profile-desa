<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\PemerintahanModel;

class PemerintahanController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $pemerintahanModel = new PemerintahanModel();

        $data = [
            'title'        => 'Pemerintahan Desa',
            'desa'         => $desaModel->getInfo(),
            'aparaturList' => $pemerintahanModel->getActive(),
        ];

        return view('pemerintahan/index', $data);
    }
}
