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
        $rules = [
            'nama_usaha'   => 'required|min_length[3]|max_length[200]',
            'nama_pemilik' => 'required|min_length[3]|max_length[150]',
            'kategori'     => 'required|max_length[100]',
            'deskripsi'    => 'required',
            'harga'        => 'permit_empty|max_length[100]',
            'whatsapp'     => 'permit_empty|max_length[50]',
            'alamat'       => 'permit_empty|max_length[255]',
            'dusun'        => 'permit_empty|max_length[100]',
            'status'       => 'permit_empty|in_list[aktif,tidak_aktif]',
            'foto'         => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $umkmModel = new UmkmModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/potensi', $newName);
            $fotoPath = 'uploads/potensi/' . $newName;
        }

        $umkmModel->insert([
            'nama_usaha'   => (string) $this->request->getPost('nama_usaha'),
            'nama_pemilik' => (string) $this->request->getPost('nama_pemilik'),
            'kategori'     => (string) $this->request->getPost('kategori'),
            'deskripsi'    => (string) $this->request->getPost('deskripsi'),
            'harga'        => (string) $this->request->getPost('harga'),
            'whatsapp'     => (string) $this->request->getPost('whatsapp'),
            'alamat'       => (string) $this->request->getPost('alamat'),
            'dusun'        => (string) $this->request->getPost('dusun'),
            'foto'         => $fotoPath,
            'is_unggulan'  => $this->request->getPost('is_unggulan') ? 1 : 0,
            'is_bumdes'    => $this->request->getPost('is_bumdes') ? 1 : 0,
            'status'       => (string) ($this->request->getPost('status') ?? 'aktif'),
        ]);

        return redirect()->to(base_url('admin/umkm'))->with('success', 'Produk UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkmModel = new UmkmModel();
        $item = $umkmModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/umkm'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/umkm/form', [
            'title' => 'Edit Produk UMKM',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama_usaha'   => 'required|min_length[3]|max_length[200]',
            'nama_pemilik' => 'required|min_length[3]|max_length[150]',
            'kategori'     => 'required|max_length[100]',
            'deskripsi'    => 'required',
            'harga'        => 'permit_empty|max_length[100]',
            'whatsapp'     => 'permit_empty|max_length[50]',
            'alamat'       => 'permit_empty|max_length[255]',
            'dusun'        => 'permit_empty|max_length[100]',
            'status'       => 'permit_empty|in_list[aktif,tidak_aktif]',
            'foto'         => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $umkmModel = new UmkmModel();
        $data = [
            'nama_usaha'   => (string) $this->request->getPost('nama_usaha'),
            'nama_pemilik' => (string) $this->request->getPost('nama_pemilik'),
            'kategori'     => (string) $this->request->getPost('kategori'),
            'deskripsi'    => (string) $this->request->getPost('deskripsi'),
            'harga'        => (string) $this->request->getPost('harga'),
            'whatsapp'     => (string) $this->request->getPost('whatsapp'),
            'alamat'       => (string) $this->request->getPost('alamat'),
            'dusun'        => (string) $this->request->getPost('dusun'),
            'is_unggulan'  => $this->request->getPost('is_unggulan') ? 1 : 0,
            'is_bumdes'    => $this->request->getPost('is_bumdes') ? 1 : 0,
            'status'       => (string) ($this->request->getPost('status') ?? 'aktif'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/potensi', $newName);
            $data['foto'] = 'uploads/potensi/' . $newName;
        }

        $umkmModel->update($id, $data);
        return redirect()->to(base_url('admin/umkm'))->with('success', 'Produk UMKM berhasil diperbarui!');
    }

    public function delete($id)
    {
        $umkmModel = new UmkmModel();
        $umkmModel->delete($id);
        return redirect()->to('/admin/umkm')->with('success', 'Produk UMKM berhasil dihapus!');
    }
}
