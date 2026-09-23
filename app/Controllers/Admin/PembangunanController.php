<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembangunanModel;

class PembangunanController extends BaseController
{
    public function index()
    {
        $pembangunanModel = new PembangunanModel();
        $list = $pembangunanModel->orderBy('tahun', 'DESC')->orderBy('id', 'DESC')->findAll();

        return view('admin/pembangunan/index', [
            'title' => 'Kelola Kegiatan Pembangunan Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/pembangunan/form', [
            'title' => 'Tambah Data Pembangunan',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $pembangunanModel = new PembangunanModel();

        $fotoSebelum = null;
        $file1 = $this->request->getFile('foto_sebelum');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            $n1 = $file1->getRandomName();
            $file1->move(FCPATH . 'uploads/desa', $n1);
            $fotoSebelum = 'uploads/desa/' . $n1;
        }

        $fotoSesudah = null;
        $file2 = $this->request->getFile('foto_sesudah');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $n2 = $file2->getRandomName();
            $file2->move(FCPATH . 'uploads/desa', $n2);
            $fotoSesudah = 'uploads/desa/' . $n2;
        }

        $nama = $this->request->getPost('nama_kegiatan');
        $slug = url_title($nama, '-', true) . '-' . time();

        $pembangunanModel->insert([
            'nama_kegiatan' => $nama,
            'slug'          => $slug,
            'bidang'        => $this->request->getPost('bidang'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'dusun'         => $this->request->getPost('dusun'),
            'anggaran'      => (int) str_replace(['.', ','], '', $this->request->getPost('anggaran')),
            'sumber_dana'   => $this->request->getPost('sumber_dana'),
            'tahun'         => $this->request->getPost('tahun'),
            'status'        => $this->request->getPost('status'),
            'progres'       => (int) $this->request->getPost('progres'),
            'foto_sebelum'  => $fotoSebelum,
            'foto_sesudah'  => $fotoSesudah,
            'lat'           => $this->request->getPost('lat'),
            'lng'           => $this->request->getPost('lng'),
            'pelaksana'     => $this->request->getPost('pelaksana'),
            'volume'        => $this->request->getPost('volume'),
            'manfaat'       => $this->request->getPost('manfaat'),
        ]);

        return redirect()->to('/admin/pembangunan')->with('success', 'Kegiatan pembangunan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembangunanModel = new PembangunanModel();
        $item = $pembangunanModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/pembangunan')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pembangunan/form', [
            'title' => 'Edit Data Pembangunan',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $pembangunanModel = new PembangunanModel();

        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'bidang'        => $this->request->getPost('bidang'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'dusun'         => $this->request->getPost('dusun'),
            'anggaran'      => (int) str_replace(['.', ','], '', $this->request->getPost('anggaran')),
            'sumber_dana'   => $this->request->getPost('sumber_dana'),
            'tahun'         => $this->request->getPost('tahun'),
            'status'        => $this->request->getPost('status'),
            'progres'       => (int) $this->request->getPost('progres'),
            'lat'           => $this->request->getPost('lat'),
            'lng'           => $this->request->getPost('lng'),
            'pelaksana'     => $this->request->getPost('pelaksana'),
            'volume'        => $this->request->getPost('volume'),
            'manfaat'       => $this->request->getPost('manfaat'),
        ];

        $file1 = $this->request->getFile('foto_sebelum');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            $n1 = $file1->getRandomName();
            $file1->move(FCPATH . 'uploads/desa', $n1);
            $data['foto_sebelum'] = 'uploads/desa/' . $n1;
        }

        $file2 = $this->request->getFile('foto_sesudah');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $n2 = $file2->getRandomName();
            $file2->move(FCPATH . 'uploads/desa', $n2);
            $data['foto_sesudah'] = 'uploads/desa/' . $n2;
        }

        $pembangunanModel->update($id, $data);
        return redirect()->to('/admin/pembangunan')->with('success', 'Kegiatan pembangunan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $pembangunanModel = new PembangunanModel();
        $pembangunanModel->delete($id);
        return redirect()->to('/admin/pembangunan')->with('success', 'Data pembangunan berhasil dihapus!');
    }
}
