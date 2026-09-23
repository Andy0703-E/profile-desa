<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title'       => 'Manajemen Layanan Publik',
            'layananList' => $this->layananModel->orderBy('urutan', 'ASC')->findAll(),
        ];

        return view('admin/layanan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Layanan Baru',
        ];

        return view('admin/layanan/form', $data);
    }

    public function store()
    {
        $rules = [
            'nama_layanan'     => 'required|min_length[3]|max_length[255]',
            'deskripsi'        => 'required',
            'estimasi_waktu'   => 'required|max_length[100]',
            'biaya'            => 'required|max_length[100]',
            'penanggung_jawab' => 'required|max_length[150]',
            'icon'             => 'required|max_length[50]',
            'status'           => 'required|in_list[aktif,nonaktif]',
            'urutan'           => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slug = mb_url_title($this->request->getPost('nama_layanan'), '-', true);
        if ($this->layananModel->where('slug', $slug)->first()) {
            $slug .= '-' . time();
        }

        $this->layananModel->insert([
            'nama_layanan'     => (string) $this->request->getPost('nama_layanan'),
            'slug'             => $slug,
            'deskripsi'        => (string) $this->request->getPost('deskripsi'),
            'estimasi_waktu'   => (string) $this->request->getPost('estimasi_waktu'),
            'biaya'            => (string) $this->request->getPost('biaya'),
            'penanggung_jawab' => (string) $this->request->getPost('penanggung_jawab'),
            'icon'             => (string) $this->request->getPost('icon'),
            'status'           => (string) $this->request->getPost('status'),
            'urutan'           => (int) $this->request->getPost('urutan'),
        ]);

        return redirect()->to(base_url('admin/layanan'))->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $layanan = $this->layananModel->find($id);

        if (! $layanan) {
            return redirect()->to(base_url('admin/layanan'))->with('error', 'Layanan tidak ditemukan.');
        }

        $data = [
            'title'   => 'Edit Layanan',
            'layanan' => $layanan,
        ];

        return view('admin/layanan/form', $data);
    }

    public function update(int $id)
    {
        $layanan = $this->layananModel->find($id);
        if (! $layanan) {
            return redirect()->to(base_url('admin/layanan'))->with('error', 'Layanan tidak ditemukan.');
        }

        $rules = [
            'nama_layanan'     => 'required|min_length[3]|max_length[255]',
            'deskripsi'        => 'required',
            'estimasi_waktu'   => 'required|max_length[100]',
            'biaya'            => 'required|max_length[100]',
            'penanggung_jawab' => 'required|max_length[150]',
            'icon'             => 'required|max_length[50]',
            'status'           => 'required|in_list[aktif,nonaktif]',
            'urutan'           => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namaLayanan = (string) $this->request->getPost('nama_layanan');
        $slug = $layanan['slug'];

        if ($namaLayanan !== $layanan['nama_layanan']) {
            $slug = mb_url_title($namaLayanan, '-', true);
            if ($this->layananModel->where('slug', $slug)->where('id !=', $id)->first()) {
                $slug .= '-' . time();
            }
        }

        $this->layananModel->update($id, [
            'nama_layanan'     => $namaLayanan,
            'slug'             => $slug,
            'deskripsi'        => (string) $this->request->getPost('deskripsi'),
            'estimasi_waktu'   => (string) $this->request->getPost('estimasi_waktu'),
            'biaya'            => (string) $this->request->getPost('biaya'),
            'penanggung_jawab' => (string) $this->request->getPost('penanggung_jawab'),
            'icon'             => (string) $this->request->getPost('icon'),
            'status'           => (string) $this->request->getPost('status'),
            'urutan'           => (int) $this->request->getPost('urutan'),
        ]);

        return redirect()->to(base_url('admin/layanan'))->with('success', 'Layanan berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $layanan = $this->layananModel->find($id);
        if (! $layanan) {
            return redirect()->to(base_url('admin/layanan'))->with('error', 'Layanan tidak ditemukan.');
        }

        $this->layananModel->delete($id);
        return redirect()->to(base_url('admin/layanan'))->with('success', 'Layanan berhasil dihapus.');
    }
}
