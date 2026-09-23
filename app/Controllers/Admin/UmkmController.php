<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UmkmModel;

class UmkmController extends BaseController
{
    public function index()
    {
        $umkmModel = new UmkmModel();
        $list = $umkmModel->orderBy('is_unggulan', 'DESC')->orderBy('id', 'DESC')->findAll();

        return view('admin/umkm/index', [
            'title' => 'Kelola Katalog UMKM & Produk Warga',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/umkm/form', [
            'title' => 'Tambah Produk UMKM',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $umkmModel = new UmkmModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/potensi', $newName);
            $fotoPath = 'uploads/potensi/' . $newName;
        }

        $umkmModel->insert([
            'nama_usaha'   => $this->request->getPost('nama_usaha'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'kategori'     => $this->request->getPost('kategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'whatsapp'     => $this->request->getPost('whatsapp'),
            'alamat'       => $this->request->getPost('alamat'),
            'dusun'        => $this->request->getPost('dusun'),
            'foto'         => $fotoPath,
            'is_unggulan'  => $this->request->getPost('is_unggulan') ? 1 : 0,
            'is_bumdes'    => $this->request->getPost('is_bumdes') ? 1 : 0,
            'status'       => $this->request->getPost('status') ?? 'aktif',
        ]);

        return redirect()->to('/admin/umkm')->with('success', 'Produk UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkmModel = new UmkmModel();
        $item = $umkmModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/umkm')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/umkm/form', [
            'title' => 'Edit Produk UMKM',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $umkmModel = new UmkmModel();
        $data = [
            'nama_usaha'   => $this->request->getPost('nama_usaha'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'kategori'     => $this->request->getPost('kategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'whatsapp'     => $this->request->getPost('whatsapp'),
            'alamat'       => $this->request->getPost('alamat'),
            'dusun'        => $this->request->getPost('dusun'),
            'is_unggulan'  => $this->request->getPost('is_unggulan') ? 1 : 0,
            'is_bumdes'    => $this->request->getPost('is_bumdes') ? 1 : 0,
            'status'       => $this->request->getPost('status') ?? 'aktif',
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/potensi', $newName);
            $data['foto'] = 'uploads/potensi/' . $newName;
        }

        $umkmModel->update($id, $data);
        return redirect()->to('/admin/umkm')->with('success', 'Produk UMKM berhasil diperbarui!');
    }

    public function delete($id)
    {
        $umkmModel = new UmkmModel();
        $umkmModel->delete($id);
        return redirect()->to('/admin/umkm')->with('success', 'Produk UMKM berhasil dihapus!');
    }
}
