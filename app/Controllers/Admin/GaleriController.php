<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\GaleriCategoryModel;

class GaleriController extends BaseController
{
    protected $galeriModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
        $this->categoryModel = new GaleriCategoryModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Manajemen Galeri Dokumentasi',
            'galeriList' => $this->galeriModel->select('galeri.*, galeri_categories.name as category_name')
                                              ->join('galeri_categories', 'galeri_categories.id = galeri.category_id', 'left')
                                              ->orderBy('galeri.id', 'DESC')
                                              ->findAll(),
        ];

        return view('admin/galeri/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Foto Galeri',
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('admin/galeri/form', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'category_id' => 'required|numeric',
            'description' => 'permit_empty|max_length[500]',
            'status'      => 'required|in_list[published,draft]',
            'image'       => 'uploaded[image]|max_size[image,3072]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/galeri', $newName);
            $imagePath = 'uploads/galeri/' . $newName;
        }

        $this->galeriModel->insert([
            'category_id' => (int) $this->request->getPost('category_id'),
            'title'       => (string) $this->request->getPost('title'),
            'description' => (string) $this->request->getPost('description'),
            'image'       => $imagePath,
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/galeri'))->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $galeri = $this->galeriModel->find($id);
        if (! $galeri) {
            return redirect()->to(base_url('admin/galeri'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Foto Galeri',
            'galeri'     => $galeri,
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('admin/galeri/form', $data);
    }

    public function update(int $id)
    {
        $galeri = $this->galeriModel->find($id);
        if (! $galeri) {
            return redirect()->to(base_url('admin/galeri'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'category_id' => 'required|numeric',
            'description' => 'permit_empty|max_length[500]',
            'status'      => 'required|in_list[published,draft]',
            'image'       => 'permit_empty|uploaded[image]|max_size[image,3072]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = $galeri['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/galeri', $newName);
            $imagePath = 'uploads/galeri/' . $newName;

            if (! empty($galeri['image']) && file_exists(FCPATH . $galeri['image'])) {
                @unlink(FCPATH . $galeri['image']);
            }
        }

        $this->galeriModel->update($id, [
            'category_id' => (int) $this->request->getPost('category_id'),
            'title'       => (string) $this->request->getPost('title'),
            'description' => (string) $this->request->getPost('description'),
            'image'       => $imagePath,
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/galeri'))->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $galeri = $this->galeriModel->find($id);
        if (! $galeri) {
            return redirect()->to(base_url('admin/galeri'))->with('error', 'Data tidak ditemukan.');
        }

        if (! empty($galeri['image']) && file_exists(FCPATH . $galeri['image'])) {
            @unlink(FCPATH . $galeri['image']);
        }

        $this->galeriModel->delete($id);
        return redirect()->to(base_url('admin/galeri'))->with('success', 'Foto galeri berhasil dihapus.');
    }
}
