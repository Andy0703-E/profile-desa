<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\DokumenPublikModel;

class DokumenController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $dokumenModel = new DokumenPublikModel();

        $kategori = $this->request->getGet('kategori');
        $q = $this->request->getGet('q');

        $dokumenList = $dokumenModel->getFiltered($kategori, $q);

        $data = [
            'title'        => 'Informasi Publik & Dokumen Desa',
            'desa'         => $desaModel->getInfo(),
            'dokumenList'  => $dokumenList,
            'kategori'     => $kategori ?? 'semua',
            'keyword'      => $q ?? '',
        ];

        return view('dokumen/index', $data);
    }

    public function download($id)
    {
        $dokumenModel = new DokumenPublikModel();
        $doc = $dokumenModel->find($id);
        if (!$doc) {
            return redirect()->to('/dokumen')->with('error', 'Dokumen tidak ditemukan');
        }

        $dokumenModel->update($id, [
            'total_download' => (int) $doc['total_download'] + 1
        ]);

        $filePath = FCPATH . $doc['file_url'];
        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        }

        return redirect()->to('/dokumen')->with('info', 'File sedang dipersiapkan oleh admin.');
    }
}
