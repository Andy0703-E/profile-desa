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
        $rules = [
            'nama'      => 'required|min_length[3]|max_length[150]',
            'kategori'  => 'required|max_length[100]',
            'lat'       => 'required|max_length[50]',
            'lng'       => 'required|max_length[50]',
            'alamat'    => 'permit_empty|max_length[255]',
            'deskripsi' => 'permit_empty',
            'kontak'    => 'permit_empty|max_length[100]',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $petaModel = new PetaTitikModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $fotoPath = 'uploads/desa/' . $newName;
        }

        $petaModel->insert([
            'nama'      => (string) $this->request->getPost('nama'),
            'kategori'  => (string) $this->request->getPost('kategori'),
            'lat'       => (string) $this->request->getPost('lat'),
            'lng'       => (string) $this->request->getPost('lng'),
            'alamat'    => (string) $this->request->getPost('alamat'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'kontak'    => (string) $this->request->getPost('kontak'),
            'foto'      => $fotoPath,
        ]);

        return redirect()->to(base_url('admin/peta'))->with('success', 'Titik lokasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $petaModel = new PetaTitikModel();
        $item = $petaModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/peta'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/peta/form', [
            'title' => 'Edit Titik Peta',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama'      => 'required|min_length[3]|max_length[150]',
            'kategori'  => 'required|max_length[100]',
            'lat'       => 'required|max_length[50]',
            'lng'       => 'required|max_length[50]',
            'alamat'    => 'permit_empty|max_length[255]',
            'deskripsi' => 'permit_empty',
            'kontak'    => 'permit_empty|max_length[100]',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $petaModel = new PetaTitikModel();
        $data = [
            'nama'      => (string) $this->request->getPost('nama'),
            'kategori'  => (string) $this->request->getPost('kategori'),
            'lat'       => (string) $this->request->getPost('lat'),
            'lng'       => (string) $this->request->getPost('lng'),
            'alamat'    => (string) $this->request->getPost('alamat'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'kontak'    => (string) $this->request->getPost('kontak'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $data['foto'] = 'uploads/desa/' . $newName;
        }

        $petaModel->update($id, $data);
        return redirect()->to(base_url('admin/peta'))->with('success', 'Titik lokasi berhasil diperbarui!');
    }

    public function delete($id)
    {
        $petaModel = new PetaTitikModel();
        $petaModel->delete($id);
        return redirect()->to('/admin/peta')->with('success', 'Titik lokasi berhasil dihapus!');
    }
}
