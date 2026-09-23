<?php

namespace App\Controllers;

use App\Models\AgendaModel;
use App\Models\DesaModel;

class AgendaController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $agendaModel = new AgendaModel();

        $kategori = $this->request->getGet('kategori');
        $builder = $agendaModel->orderBy('tanggal_mulai', 'DESC');
        if ($kategori && $kategori !== 'semua') {
            $builder->where('kategori', $kategori);
        }

        $list = $builder->findAll();
        $kategoriList = $agendaModel->select('kategori')->distinct()->findAll();

        $data = [
            'title'        => 'Agenda & Kegiatan Desa',
            'desa'         => $desaModel->getInfo(),
            'agendaList'   => $list,
            'kategoriList' => $kategoriList,
            'currentCat'   => $kategori ?? 'semua',
        ];

        return view('agenda/index', $data);
    }
}
