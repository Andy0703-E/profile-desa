<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\BeritaCategoryModel;

class BeritaController extends BaseController
{
    protected $beritaModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->categoryModel = new BeritaCategoryModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Manajemen Berita & Artikel',
            'beritaList' => $this->beritaModel->select('berita.*, berita_categories.name as category_name, users.name as author_name')
                                              ->join('berita_categories', 'berita_categories.id = berita.category_id', 'left')
                                              ->join('users', 'users.id = berita.author_id', 'left')
                                              ->orderBy('berita.created_at', 'DESC')
                                              ->findAll(),
        ];

        return view('admin/berita/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Berita Baru',
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('admin/berita/form', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[5]|max_length[255]',
            'category_id' => 'required|numeric',
            'excerpt'     => 'required|max_length[500]',
            'content'     => 'required',
            'status'      => 'required|in_list[draft,published,archived]',
            'thumbnail'   => 'permit_empty|max_size[thumbnail,2048]|ext_in[thumbnail,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slug = mb_url_title($this->request->getPost('title'), '-', true);
        
        // Ensure unique slug
        if ($this->beritaModel->where('slug', $slug)->first()) {
            $slug .= '-' . time();
        }

        $thumbnailPath = null;
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/berita', $newName);
            $thumbnailPath = 'uploads/berita/' . $newName;
        }

        $this->beritaModel->insert([
            'category_id'  => (int) $this->request->getPost('category_id'),
            'author_id'    => session('userId'),
            'title'        => (string) $this->request->getPost('title'),
            'slug'         => $slug,
            'excerpt'      => (string) $this->request->getPost('excerpt'),
            'content'      => (string) $this->request->getPost('content'),
            'thumbnail'    => $thumbnailPath,
            'status'       => (string) $this->request->getPost('status'),
            'published_at' => $this->request->getPost('status') === 'published' ? date('Y-m-d H:i:s') : null,
        ]);

        return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $berita = $this->beritaModel->find($id);

        if (! $berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Berita',
            'berita'     => $berita,
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('admin/berita/form', $data);
    }

    public function update(int $id)
    {
        $berita = $this->beritaModel->find($id);
        if (! $berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'title'       => 'required|min_length[5]|max_length[255]',
            'category_id' => 'required|numeric',
            'excerpt'     => 'required|max_length[500]',
            'content'     => 'required',
            'status'      => 'required|in_list[draft,published,archived]',
            'thumbnail'   => 'permit_empty|max_size[thumbnail,2048]|ext_in[thumbnail,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = (string) $this->request->getPost('title');
        $slug = $berita['slug'];
        
        if ($title !== $berita['title']) {
            $slug = mb_url_title($title, '-', true);
            if ($this->beritaModel->where('slug', $slug)->where('id !=', $id)->first()) {
                $slug .= '-' . time();
            }
        }

        $thumbnailPath = $berita['thumbnail'];
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/berita', $newName);
            $thumbnailPath = 'uploads/berita/' . $newName;
            
            // Delete old file if exists
            if (! empty($berita['thumbnail']) && file_exists(FCPATH . $berita['thumbnail'])) {
                @unlink(FCPATH . $berita['thumbnail']);
            }
        }

        $status = (string) $this->request->getPost('status');
        $publishedAt = $berita['published_at'];
        if ($status === 'published' && empty($publishedAt)) {
            $publishedAt = date('Y-m-d H:i:s');
        }

        $this->beritaModel->update($id, [
            'category_id'  => (int) $this->request->getPost('category_id'),
            'title'        => $title,
            'slug'         => $slug,
            'excerpt'      => (string) $this->request->getPost('excerpt'),
            'content'      => (string) $this->request->getPost('content'),
            'thumbnail'    => $thumbnailPath,
            'status'       => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $berita = $this->beritaModel->find($id);
        if (! $berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Data tidak ditemukan.');
        }

        if (! empty($berita['thumbnail']) && file_exists(FCPATH . $berita['thumbnail'])) {
            @unlink(FCPATH . $berita['thumbnail']);
        }

        $this->beritaModel->delete($id);
        return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil dihapus.');
    }
}
