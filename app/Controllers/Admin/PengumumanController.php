<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class PengumumanController extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $data = [
            'title'          => 'Manajemen Pengumuman',
            'pengumumanList' => $this->pengumumanModel->orderBy('tanggal', 'DESC')->findAll(),
        ];

        return view('admin/pengumuman/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Pengumuman Baru'];
        return view('admin/pengumuman/form', $data);
    }

    public function store()
    {
        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'isi'       => 'required',
            'prioritas' => 'required|in_list[biasa,penting,mendesak]',
            'status'    => 'required|in_list[aktif,nonaktif]',
            'tanggal'   => 'required|valid_date',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pengumumanModel->insert([
            'judul'     => (string) $this->request->getPost('judul'),
            'isi'       => (string) $this->request->getPost('isi'),
            'prioritas' => (string) $this->request->getPost('prioritas'),
            'status'    => (string) $this->request->getPost('status'),
            'tanggal'   => (string) $this->request->getPost('tanggal'),
        ]);

        return redirect()->to(base_url('admin/pengumuman'))->with('success', 'Pengumuman berhasil diterbitkan.');
    }

    public function edit(int $id)
    {
        $pengumuman = $this->pengumumanModel->find($id);
        if (! $pengumuman) {
            return redirect()->to(base_url('admin/pengumuman'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Pengumuman',
            'pengumuman' => $pengumuman,
        ];

        return view('admin/pengumuman/form', $data);
    }

    public function update(int $id)
    {
        $pengumuman = $this->pengumumanModel->find($id);
        if (! $pengumuman) {
            return redirect()->to(base_url('admin/pengumuman'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'judul'     => 'required|min_length[3]|max_length[255]',
            'isi'       => 'required',
            'prioritas' => 'required|in_list[biasa,penting,mendesak]',
            'status'    => 'required|in_list[aktif,nonaktif]',
            'tanggal'   => 'required|valid_date',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pengumumanModel->update($id, [
            'judul'     => (string) $this->request->getPost('judul'),
            'isi'       => (string) $this->request->getPost('isi'),
            'prioritas' => (string) $this->request->getPost('prioritas'),
            'status'    => (string) $this->request->getPost('status'),
            'tanggal'   => (string) $this->request->getPost('tanggal'),
        ]);

        return redirect()->to(base_url('admin/pengumuman'))->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $pengumuman = $this->pengumumanModel->find($id);
        if (! $pengumuman) {
            return redirect()->to(base_url('admin/pengumuman'))->with('error', 'Data tidak ditemukan.');
        }

        $this->pengumumanModel->delete($id);
        return redirect()->to(base_url('admin/pengumuman'))->with('success', 'Pengumuman berhasil dihapus.');
    }
}
