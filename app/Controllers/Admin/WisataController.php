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
        $wisataModel = new WisataModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $fotoPath = 'uploads/desa/' . $newName;
        }

        $nama = $this->request->getPost('nama');
        $slug = url_title($nama, '-', true) . '-' . time();

        $wisataModel->insert([
            'nama'             => $nama,
            'slug'             => $slug,
            'kategori'         => $this->request->getPost('kategori'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'daya_tarik'       => $this->request->getPost('daya_tarik'),
            'harga_tiket'      => $this->request->getPost('harga_tiket'),
            'jam_buka'         => $this->request->getPost('jam_buka'),
            'fasilitas'        => $this->request->getPost('fasilitas'),
            'kontak_pengelola' => $this->request->getPost('kontak_pengelola'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'lat'              => $this->request->getPost('lat'),
            'lng'              => $this->request->getPost('lng'),
            'maps_url'         => $this->request->getPost('maps_url'),
            'foto'             => $fotoPath,
            'status'           => $this->request->getPost('status') ?? 'aktif',
        ]);

        return redirect()->to('/admin/wisata')->with('success', 'Destinasi wisata berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $wisataModel = new WisataModel();
        $item = $wisataModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/wisata')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/wisata/form', [
            'title' => 'Edit Destinasi Wisata',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $wisataModel = new WisataModel();
        $data = [
            'nama'             => $this->request->getPost('nama'),
            'kategori'         => $this->request->getPost('kategori'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'daya_tarik'       => $this->request->getPost('daya_tarik'),
            'harga_tiket'      => $this->request->getPost('harga_tiket'),
            'jam_buka'         => $this->request->getPost('jam_buka'),
            'fasilitas'        => $this->request->getPost('fasilitas'),
            'kontak_pengelola' => $this->request->getPost('kontak_pengelola'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'lat'              => $this->request->getPost('lat'),
            'lng'              => $this->request->getPost('lng'),
            'maps_url'         => $this->request->getPost('maps_url'),
            'status'           => $this->request->getPost('status') ?? 'aktif',
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $data['foto'] = 'uploads/desa/' . $newName;
        }

        $wisataModel->update($id, $data);
        return redirect()->to('/admin/wisata')->with('success', 'Destinasi wisata berhasil diperbarui!');
    }

    public function delete($id)
    {
        $wisataModel = new WisataModel();
        $wisataModel->delete($id);
        return redirect()->to('/admin/wisata')->with('success', 'Destinasi wisata berhasil dihapus!');
    }
}
