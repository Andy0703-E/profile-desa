<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DusunModel;

class DusunController extends BaseController
{
    public function index()
    {
        $dusunModel = new DusunModel();
        $list = $dusunModel->findAll();

        return view('admin/dusun/index', [
            'title' => 'Kelola Wilayah & Data Dusun',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/dusun/form', [
            'title' => 'Tambah Dusun',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $dusunModel = new DusunModel();

        $dusunModel->insert([
            'nama_dusun'    => $this->request->getPost('nama_dusun'),
            'kepala_dusun'  => $this->request->getPost('kepala_dusun'),
            'jumlah_rt'     => (int) $this->request->getPost('jumlah_rt'),
            'jumlah_rw'     => (int) $this->request->getPost('jumlah_rw'),
            'jumlah_kk'     => (int) $this->request->getPost('jumlah_kk'),
            'jumlah_jiwa'   => (int) $this->request->getPost('jumlah_jiwa'),
            'batas_wilayah' => $this->request->getPost('batas_wilayah'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/dusun')->with('success', 'Data dusun berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dusunModel = new DusunModel();
        $item = $dusunModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/dusun')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/dusun/form', [
            'title' => 'Edit Dusun',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $dusunModel = new DusunModel();
        $data = [
            'nama_dusun'    => $this->request->getPost('nama_dusun'),
            'kepala_dusun'  => $this->request->getPost('kepala_dusun'),
            'jumlah_rt'     => (int) $this->request->getPost('jumlah_rt'),
            'jumlah_rw'     => (int) $this->request->getPost('jumlah_rw'),
            'jumlah_kk'     => (int) $this->request->getPost('jumlah_kk'),
            'jumlah_jiwa'   => (int) $this->request->getPost('jumlah_jiwa'),
            'batas_wilayah' => $this->request->getPost('batas_wilayah'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ];

        $dusunModel->update($id, $data);
        return redirect()->to('/admin/dusun')->with('success', 'Data dusun berhasil diperbarui!');
    }

    public function delete($id)
    {
        $dusunModel = new DusunModel();
        $dusunModel->delete($id);
        return redirect()->to('/admin/dusun')->with('success', 'Data dusun berhasil dihapus!');
    }
}
