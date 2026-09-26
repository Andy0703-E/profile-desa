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
        $rules = [
            'nama_kegiatan' => 'required|min_length[3]|max_length[255]',
            'bidang'        => 'required|max_length[150]',
            'lokasi'        => 'permit_empty|max_length[255]',
            'dusun'         => 'permit_empty|max_length[100]',
            'anggaran'      => 'required',
            'sumber_dana'   => 'permit_empty|max_length[100]',
            'tahun'         => 'required|numeric|exact_length[4]',
            'status'        => 'required|in_list[rencana,berjalan,selesai]',
            'progres'       => 'permit_empty|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'lat'           => 'permit_empty|max_length[50]',
            'lng'           => 'permit_empty|max_length[50]',
            'pelaksana'     => 'permit_empty|max_length[150]',
            'volume'        => 'permit_empty|max_length[100]',
            'manfaat'       => 'permit_empty',
            'foto_sebelum'  => 'permit_empty|max_size[foto_sebelum,2048]|ext_in[foto_sebelum,jpg,jpeg,png,webp]',
            'foto_sesudah'  => 'permit_empty|max_size[foto_sesudah,2048]|ext_in[foto_sesudah,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

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

        $nama = (string) $this->request->getPost('nama_kegiatan');
        $slug = url_title($nama, '-', true) . '-' . time();

        $pembangunanModel->insert([
            'nama_kegiatan' => $nama,
            'slug'          => $slug,
            'bidang'        => (string) $this->request->getPost('bidang'),
            'lokasi'        => (string) $this->request->getPost('lokasi'),
            'dusun'         => (string) $this->request->getPost('dusun'),
            'anggaran'      => (int) str_replace(['.', ','], '', (string) $this->request->getPost('anggaran')),
            'sumber_dana'   => (string) $this->request->getPost('sumber_dana'),
            'tahun'         => (string) $this->request->getPost('tahun'),
            'status'        => (string) $this->request->getPost('status'),
            'progres'       => (int) ($this->request->getPost('progres') ?? 0),
            'foto_sebelum'  => $fotoSebelum,
            'foto_sesudah'  => $fotoSesudah,
            'lat'           => (string) $this->request->getPost('lat'),
            'lng'           => (string) $this->request->getPost('lng'),
            'pelaksana'     => (string) $this->request->getPost('pelaksana'),
            'volume'        => (string) $this->request->getPost('volume'),
            'manfaat'       => (string) $this->request->getPost('manfaat'),
        ]);

        return redirect()->to(base_url('admin/pembangunan'))->with('success', 'Kegiatan pembangunan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembangunanModel = new PembangunanModel();
        $item = $pembangunanModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/pembangunan'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pembangunan/form', [
            'title' => 'Edit Data Pembangunan',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama_kegiatan' => 'required|min_length[3]|max_length[255]',
            'bidang'        => 'required|max_length[150]',
            'lokasi'        => 'permit_empty|max_length[255]',
            'dusun'         => 'permit_empty|max_length[100]',
            'anggaran'      => 'required',
            'sumber_dana'   => 'permit_empty|max_length[100]',
            'tahun'         => 'required|numeric|exact_length[4]',
            'status'        => 'required|in_list[rencana,berjalan,selesai]',
            'progres'       => 'permit_empty|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'lat'           => 'permit_empty|max_length[50]',
            'lng'           => 'permit_empty|max_length[50]',
            'pelaksana'     => 'permit_empty|max_length[150]',
            'volume'        => 'permit_empty|max_length[100]',
            'manfaat'       => 'permit_empty',
            'foto_sebelum'  => 'permit_empty|max_size[foto_sebelum,2048]|ext_in[foto_sebelum,jpg,jpeg,png,webp]',
            'foto_sesudah'  => 'permit_empty|max_size[foto_sesudah,2048]|ext_in[foto_sesudah,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $pembangunanModel = new PembangunanModel();

        $data = [
            'nama_kegiatan' => (string) $this->request->getPost('nama_kegiatan'),
            'bidang'        => (string) $this->request->getPost('bidang'),
            'lokasi'        => (string) $this->request->getPost('lokasi'),
            'dusun'         => (string) $this->request->getPost('dusun'),
            'anggaran'      => (int) str_replace(['.', ','], '', (string) $this->request->getPost('anggaran')),
            'sumber_dana'   => (string) $this->request->getPost('sumber_dana'),
            'tahun'         => (string) $this->request->getPost('tahun'),
            'status'        => (string) $this->request->getPost('status'),
            'progres'       => (int) ($this->request->getPost('progres') ?? 0),
            'lat'           => (string) $this->request->getPost('lat'),
            'lng'           => (string) $this->request->getPost('lng'),
            'pelaksana'     => (string) $this->request->getPost('pelaksana'),
            'volume'        => (string) $this->request->getPost('volume'),
            'manfaat'       => (string) $this->request->getPost('manfaat'),
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
        return redirect()->to(base_url('admin/pembangunan'))->with('success', 'Kegiatan pembangunan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $pembangunanModel = new PembangunanModel();
        $pembangunanModel->delete($id);
        return redirect()->to('/admin/pembangunan')->with('success', 'Data pembangunan berhasil dihapus!');
    }
}
