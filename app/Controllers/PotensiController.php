<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\UmkmModel;
use App\Models\WisataModel;

class PotensiController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $umkmModel = new UmkmModel();
        $wisataModel = new WisataModel();

        $kategoriUmkm = $this->request->getGet('kat_umkm');
        $umkmBuilder = $umkmModel->where('status', 'aktif')->orderBy('is_unggulan', 'DESC')->orderBy('is_bumdes', 'DESC');
        if ($kategoriUmkm && $kategoriUmkm !== 'semua') {
            $umkmBuilder->where('kategori', $kategoriUmkm);
        }

        $kategoriUmkmList = $umkmModel->select('kategori')->distinct()->findAll();

        $data = [
            'title'            => 'Potensi, UMKM & Wisata Desa',
            'desa'             => $desaModel->getInfo(),
            'umkmList'         => $umkmBuilder->findAll(),
            'wisataList'       => $wisataModel->getActive(),
            'kategoriUmkmList' => $kategoriUmkmList,
            'currentKatUmkm'   => $kategoriUmkm ?? 'semua',
        ];

        return view('potensi/index', $data);
    }

    public function umkmDetail($id)
    {
        $desaModel = new DesaModel();
        $umkmModel = new UmkmModel();

        $item = $umkmModel->find($id);
        if (!$item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => esc($item['nama_usaha']),
            'desa'  => $desaModel->getInfo(),
            'item'  => $item,
        ];

        return view('potensi/umkm_detail', $data);
    }

    public function wisataDetail($slug)
    {
        $desaModel = new DesaModel();
        $wisataModel = new WisataModel();

        $item = $wisataModel->where('slug', $slug)->first();
        if (!$item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => esc($item['nama']),
            'desa'  => $desaModel->getInfo(),
            'item'  => $item,
        ];

        return view('potensi/wisata_detail', $data);
    }
}
