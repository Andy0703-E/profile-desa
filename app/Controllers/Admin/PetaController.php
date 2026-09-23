<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PetaTitikModel;

class PetaController extends BaseController
{
    public function index()
    {
        $petaModel = new PetaTitikModel();
        $list = $petaModel->orderBy('id', 'DESC')->findAll();

        return view('admin/peta/index', [
            'title' => 'Kelola Titik Peta Geospasial Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/peta/form', [
            'title' => 'Tambah Titik Peta',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $petaModel = new PetaTitikModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $fotoPath = 'uploads/desa/' . $newName;
        }

        $petaModel->insert([
            'nama'      => $this->request->getPost('nama'),
            'kategori'  => $this->request->getPost('kategori'),
            'lat'       => $this->request->getPost('lat'),
            'lng'       => $this->request->getPost('lng'),
            'alamat'    => $this->request->getPost('alamat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kontak'    => $this->request->getPost('kontak'),
            'foto'      => $fotoPath,
        ]);

        return redirect()->to('/admin/peta')->with('success', 'Titik lokasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $petaModel = new PetaTitikModel();
        $item = $petaModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/peta')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/peta/form', [
            'title' => 'Edit Titik Peta',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $petaModel = new PetaTitikModel();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'kategori'  => $this->request->getPost('kategori'),
            'lat'       => $this->request->getPost('lat'),
            'lng'       => $this->request->getPost('lng'),
            'alamat'    => $this->request->getPost('alamat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kontak'    => $this->request->getPost('kontak'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $data['foto'] = 'uploads/desa/' . $newName;
        }

        $petaModel->update($id, $data);
        return redirect()->to('/admin/peta')->with('success', 'Titik lokasi berhasil diperbarui!');
    }

    public function delete($id)
    {
        $petaModel = new PetaTitikModel();
        $petaModel->delete($id);
        return redirect()->to('/admin/peta')->with('success', 'Titik lokasi berhasil dihapus!');
    }
}
