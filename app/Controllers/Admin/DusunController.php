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
        $rules = [
            'nama_dusun'    => 'required|min_length[3]|max_length[100]',
            'kepala_dusun'  => 'required|min_length[3]|max_length[150]',
            'jumlah_rt'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_rw'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_kk'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_jiwa'   => 'permit_empty|numeric|greater_than_equal_to[0]',
            'batas_wilayah' => 'permit_empty',
            'deskripsi'     => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dusunModel = new DusunModel();

        $dusunModel->insert([
            'nama_dusun'    => (string) $this->request->getPost('nama_dusun'),
            'kepala_dusun'  => (string) $this->request->getPost('kepala_dusun'),
            'jumlah_rt'     => (int) ($this->request->getPost('jumlah_rt') ?? 0),
            'jumlah_rw'     => (int) ($this->request->getPost('jumlah_rw') ?? 0),
            'jumlah_kk'     => (int) ($this->request->getPost('jumlah_kk') ?? 0),
            'jumlah_jiwa'   => (int) ($this->request->getPost('jumlah_jiwa') ?? 0),
            'batas_wilayah' => (string) $this->request->getPost('batas_wilayah'),
            'deskripsi'     => (string) $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to(base_url('admin/dusun'))->with('success', 'Data dusun berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dusunModel = new DusunModel();
        $item = $dusunModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/dusun'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/dusun/form', [
            'title' => 'Edit Dusun',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama_dusun'    => 'required|min_length[3]|max_length[100]',
            'kepala_dusun'  => 'required|min_length[3]|max_length[150]',
            'jumlah_rt'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_rw'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_kk'     => 'permit_empty|numeric|greater_than_equal_to[0]',
            'jumlah_jiwa'   => 'permit_empty|numeric|greater_than_equal_to[0]',
            'batas_wilayah' => 'permit_empty',
            'deskripsi'     => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dusunModel = new DusunModel();
        $data = [
            'nama_dusun'    => (string) $this->request->getPost('nama_dusun'),
            'kepala_dusun'  => (string) $this->request->getPost('kepala_dusun'),
            'jumlah_rt'     => (int) ($this->request->getPost('jumlah_rt') ?? 0),
            'jumlah_rw'     => (int) ($this->request->getPost('jumlah_rw') ?? 0),
            'jumlah_kk'     => (int) ($this->request->getPost('jumlah_kk') ?? 0),
            'jumlah_jiwa'   => (int) ($this->request->getPost('jumlah_jiwa') ?? 0),
            'batas_wilayah' => (string) $this->request->getPost('batas_wilayah'),
            'deskripsi'     => (string) $this->request->getPost('deskripsi'),
        ];

        $dusunModel->update($id, $data);
        return redirect()->to(base_url('admin/dusun'))->with('success', 'Data dusun berhasil diperbarui!');
    }

    public function delete($id)
    {
        $dusunModel = new DusunModel();
        $dusunModel->delete($id);
        return redirect()->to('/admin/dusun')->with('success', 'Data dusun berhasil dihapus!');
    }
}
