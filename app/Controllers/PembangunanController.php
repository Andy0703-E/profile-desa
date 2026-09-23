<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\PembangunanModel;

class PembangunanController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $pembangunanModel = new PembangunanModel();

        $tahun = $this->request->getGet('tahun');
        $status = $this->request->getGet('status');

        $builder = $pembangunanModel->orderBy('tahun', 'DESC')->orderBy('id', 'DESC');
        if ($tahun) {
            $builder->where('tahun', $tahun);
        }
        if ($status && $status !== 'semua') {
            $builder->where('status', $status);
        }

        $list = $builder->findAll();
        $allYears = $pembangunanModel->select('tahun')->distinct()->orderBy('tahun', 'DESC')->findAll();

        $data = [
            'title'       => 'Informasi Pembangunan Desa',
            'desa'        => $desaModel->getInfo(),
            'list'        => $list,
            'allYears'    => $allYears,
            'selectedYear'=> $tahun,
            'selectedStatus' => $status ?? 'semua',
        ];

        return view('pembangunan/index', $data);
    }

    public function detail($slug)
    {
        $desaModel = new DesaModel();
        $pembangunanModel = new PembangunanModel();

        $item = $pembangunanModel->where('slug', $slug)->first();
        if (!$item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => esc($item['nama_kegiatan']),
            'desa'  => $desaModel->getInfo(),
            'item'  => $item,
        ];

        return view('pembangunan/detail', $data);
    }
}
