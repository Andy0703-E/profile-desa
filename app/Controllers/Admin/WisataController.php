<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WisataModel;

class WisataController extends BaseController
{
    public function index()
    {
        $wisataModel = new WisataModel();
        $list = $wisataModel->orderBy('id', 'DESC')->findAll();

        return view('admin/wisata/index', [
            'title' => 'Kelola Objek Wisata Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/wisata/form', [
            'title' => 'Tambah Destinasi Wisata',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $rules = [
            'nama'             => 'required|min_length[3]|max_length[200]',
            'kategori'         => 'required|max_length[100]',
            'deskripsi'        => 'required',
            'daya_tarik'       => 'permit_empty',
            'harga_tiket'      => 'permit_empty|max_length[100]',
            'jam_buka'         => 'permit_empty|max_length[100]',
            'fasilitas'        => 'permit_empty',
            'kontak_pengelola' => 'permit_empty|max_length[150]',
            'lokasi'           => 'permit_empty|max_length[255]',
            'lat'              => 'permit_empty|max_length[50]',
            'lng'              => 'permit_empty|max_length[50]',
            'maps_url'         => 'permit_empty|max_length[500]',
            'status'           => 'permit_empty|in_list[aktif,tidak_aktif]',
            'foto'             => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $wisataModel = new WisataModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $fotoPath = 'uploads/desa/' . $newName;
        }

        $nama = (string) $this->request->getPost('nama');
        $slug = url_title($nama, '-', true) . '-' . time();

        $wisataModel->insert([
            'nama'             => $nama,
            'slug'             => $slug,
            'kategori'         => (string) $this->request->getPost('kategori'),
            'deskripsi'        => (string) $this->request->getPost('deskripsi'),
            'daya_tarik'       => (string) $this->request->getPost('daya_tarik'),
            'harga_tiket'      => (string) $this->request->getPost('harga_tiket'),
            'jam_buka'         => (string) $this->request->getPost('jam_buka'),
            'fasilitas'        => (string) $this->request->getPost('fasilitas'),
            'kontak_pengelola' => (string) $this->request->getPost('kontak_pengelola'),
            'lokasi'           => (string) $this->request->getPost('lokasi'),
            'lat'              => (string) $this->request->getPost('lat'),
            'lng'              => (string) $this->request->getPost('lng'),
            'maps_url'         => (string) $this->request->getPost('maps_url'),
            'foto'             => $fotoPath,
            'status'           => (string) ($this->request->getPost('status') ?? 'aktif'),
        ]);

        return redirect()->to(base_url('admin/wisata'))->with('success', 'Destinasi wisata berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $wisataModel = new WisataModel();
        $item = $wisataModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/wisata'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/wisata/form', [
            'title' => 'Edit Destinasi Wisata',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama'             => 'required|min_length[3]|max_length[200]',
            'kategori'         => 'required|max_length[100]',
            'deskripsi'        => 'required',
            'daya_tarik'       => 'permit_empty',
            'harga_tiket'      => 'permit_empty|max_length[100]',
            'jam_buka'         => 'permit_empty|max_length[100]',
            'fasilitas'        => 'permit_empty',
            'kontak_pengelola' => 'permit_empty|max_length[150]',
            'lokasi'           => 'permit_empty|max_length[255]',
            'lat'              => 'permit_empty|max_length[50]',
            'lng'              => 'permit_empty|max_length[50]',
            'maps_url'         => 'permit_empty|max_length[500]',
            'status'           => 'permit_empty|in_list[aktif,tidak_aktif]',
            'foto'             => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $wisataModel = new WisataModel();
        $data = [
            'nama'             => (string) $this->request->getPost('nama'),
            'kategori'         => (string) $this->request->getPost('kategori'),
            'deskripsi'        => (string) $this->request->getPost('deskripsi'),
            'daya_tarik'       => (string) $this->request->getPost('daya_tarik'),
            'harga_tiket'      => (string) $this->request->getPost('harga_tiket'),
            'jam_buka'         => (string) $this->request->getPost('jam_buka'),
            'fasilitas'        => (string) $this->request->getPost('fasilitas'),
            'kontak_pengelola' => (string) $this->request->getPost('kontak_pengelola'),
            'lokasi'           => (string) $this->request->getPost('lokasi'),
            'lat'              => (string) $this->request->getPost('lat'),
            'lng'              => (string) $this->request->getPost('lng'),
            'maps_url'         => (string) $this->request->getPost('maps_url'),
            'status'           => (string) ($this->request->getPost('status') ?? 'aktif'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $data['foto'] = 'uploads/desa/' . $newName;
        }

        $wisataModel->update($id, $data);
        return redirect()->to(base_url('admin/wisata'))->with('success', 'Destinasi wisata berhasil diperbarui!');
    }

    public function delete($id)
    {
        $wisataModel = new WisataModel();
        $wisataModel->delete($id);
        return redirect()->to('/admin/wisata')->with('success', 'Destinasi wisata berhasil dihapus!');
    }
}
