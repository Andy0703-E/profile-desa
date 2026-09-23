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
        $videoModel = new GaleriVideoModel();

        $videoModel->insert([
            'judul'      => $this->request->getPost('judul'),
            'embed_url'  => $this->request->getPost('embed_url'),
            'durasi'     => $this->request->getPost('durasi'),
            'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/video')->with('success', 'Video berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $videoModel = new GaleriVideoModel();
        $item = $videoModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/video')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/video/form', [
            'title' => 'Edit Video',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $videoModel = new GaleriVideoModel();
        $data = [
            'judul'      => $this->request->getPost('judul'),
            'embed_url'  => $this->request->getPost('embed_url'),
            'durasi'     => $this->request->getPost('durasi'),
            'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $videoModel->update($id, $data);
        return redirect()->to('/admin/video')->with('success', 'Video berhasil diperbarui!');
    }

    public function delete($id)
    {
        $videoModel = new GaleriVideoModel();
        $videoModel->delete($id);
        return redirect()->to('/admin/video')->with('success', 'Video berhasil dihapus!');
    }
}
