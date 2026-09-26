<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriVideoModel;

class VideoController extends BaseController
{
    public function index()
    {
        $videoModel = new GaleriVideoModel();
        $list = $videoModel->orderBy('id', 'DESC')->findAll();

        return view('admin/video/index', [
            'title' => 'Kelola Video Dokumentasi Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/video/form', [
            'title' => 'Tambah Video',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $rules = [
            'judul'      => 'required|min_length[3]|max_length[200]',
            'embed_url'  => 'required|max_length[500]',
            'durasi'     => 'permit_empty|max_length[50]',
            'tanggal'    => 'permit_empty|valid_date[Y-m-d]',
            'keterangan' => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $videoModel = new GaleriVideoModel();

        $videoModel->insert([
            'judul'      => (string) $this->request->getPost('judul'),
            'embed_url'  => (string) $this->request->getPost('embed_url'),
            'durasi'     => (string) $this->request->getPost('durasi'),
            'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
            'keterangan' => (string) $this->request->getPost('keterangan'),
        ]);

        return redirect()->to(base_url('admin/video'))->with('success', 'Video berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $videoModel = new GaleriVideoModel();
        $item = $videoModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/video'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/video/form', [
            'title' => 'Edit Video',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'judul'      => 'required|min_length[3]|max_length[200]',
            'embed_url'  => 'required|max_length[500]',
            'durasi'     => 'permit_empty|max_length[50]',
            'tanggal'    => 'permit_empty|valid_date[Y-m-d]',
            'keterangan' => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $videoModel = new GaleriVideoModel();
        $data = [
            'judul'      => (string) $this->request->getPost('judul'),
            'embed_url'  => (string) $this->request->getPost('embed_url'),
            'durasi'     => (string) $this->request->getPost('durasi'),
            'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
            'keterangan' => (string) $this->request->getPost('keterangan'),
        ];

        $videoModel->update($id, $data);
        return redirect()->to(base_url('admin/video'))->with('success', 'Video berhasil diperbarui!');
    }

    public function delete($id)
    {
        $videoModel = new GaleriVideoModel();
        $videoModel->delete($id);
        return redirect()->to('/admin/video')->with('success', 'Video berhasil dihapus!');
    }
}
