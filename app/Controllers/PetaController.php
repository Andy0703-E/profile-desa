<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\PetaTitikModel;

class PetaController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $petaModel = new PetaTitikModel();

        $kategori = $this->request->getGet('kategori') ?? 'semua';
        $titikList = $petaModel->getByCategory($kategori);

        $kategoriList = $petaModel->select('kategori')->distinct()->findAll();

        $data = [
            'title'        => 'Peta Wilayah & Geospasial Desa',
            'desa'         => $desaModel->getInfo(),
            'titikList'    => $titikList,
            'kategoriList' => $kategoriList,
            'currentCat'   => $kategori,
        ];

        return view('peta/index', $data);
    }
}
