<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PotensiDesaModel;

class PotensiController extends BaseController
{
    protected $potensiModel;

    public function __construct()
    {
        $this->potensiModel = new PotensiDesaModel();
    }

    public function index()
    {
        $data = [
            'title'       => 'Manajemen Potensi Desa',
            'potensiList' => $this->potensiModel->orderBy('id', 'ASC')->findAll(),
        ];

        return view('admin/potensi/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Potensi Desa'];
        return view('admin/potensi/form', $data);
    }

    public function store()
    {
        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'kategori'  => 'required|max_length[100]',
            'deskripsi' => 'required',
            'status'    => 'required|in_list[published,draft]',
            'image'     => 'permit_empty|uploaded[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slug = mb_url_title($this->request->getPost('judul'), '-', true);
        if ($this->potensiModel->where('slug', $slug)->first()) {
            $slug .= '-' . time();
        }

        $imagePath = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/potensi', $newName);
            $imagePath = 'uploads/potensi/' . $newName;
        }

        $this->potensiModel->insert([
            'judul'     => (string) $this->request->getPost('judul'),
            'slug'      => $slug,
            'kategori'  => (string) $this->request->getPost('kategori'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'image'     => $imagePath,
            'status'    => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/potensi'))->with('success', 'Potensi desa berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $potensi = $this->potensiModel->find($id);
        if (! $potensi) {
            return redirect()->to(base_url('admin/potensi'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'   => 'Edit Potensi Desa',
            'potensi' => $potensi,
        ];

        return view('admin/potensi/form', $data);
    }

    public function update(int $id)
    {
        $potensi = $this->potensiModel->find($id);
        if (! $potensi) {
            return redirect()->to(base_url('admin/potensi'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'kategori'  => 'required|max_length[100]',
            'deskripsi' => 'required',
            'status'    => 'required|in_list[published,draft]',
            'image'     => 'permit_empty|uploaded[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judul = (string) $this->request->getPost('judul');
        $slug = $potensi['slug'];
        if ($judul !== $potensi['judul']) {
            $slug = mb_url_title($judul, '-', true);
            if ($this->potensiModel->where('slug', $slug)->where('id !=', $id)->first()) {
                $slug .= '-' . time();
            }
        }

        $imagePath = $potensi['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/potensi', $newName);
            $imagePath = 'uploads/potensi/' . $newName;

            if (! empty($potensi['image']) && file_exists(FCPATH . $potensi['image'])) {
                @unlink(FCPATH . $potensi['image']);
            }
        }

        $this->potensiModel->update($id, [
            'judul'     => $judul,
            'slug'      => $slug,
            'kategori'  => (string) $this->request->getPost('kategori'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'image'     => $imagePath,
            'status'    => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/potensi'))->with('success', 'Potensi desa berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $potensi = $this->potensiModel->find($id);
        if (! $potensi) {
            return redirect()->to(base_url('admin/potensi'))->with('error', 'Data tidak ditemukan.');
        }

        if (! empty($potensi['image']) && file_exists(FCPATH . $potensi['image'])) {
            @unlink(FCPATH . $potensi['image']);
        }

        $this->potensiModel->delete($id);
        return redirect()->to(base_url('admin/potensi'))->with('success', 'Potensi desa berhasil dihapus.');
    }
}
