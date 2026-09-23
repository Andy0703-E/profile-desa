<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgendaModel;

class AgendaController extends BaseController
{
    public function index()
    {
        $agendaModel = new AgendaModel();
        $list = $agendaModel->orderBy('tanggal_mulai', 'DESC')->findAll();

        return view('admin/agenda/index', [
            'title' => 'Kelola Agenda & Kegiatan Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/agenda/form', [
            'title' => 'Tambah Agenda Kegiatan',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $agendaModel = new AgendaModel();
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', true) . '-' . time();

        $agendaModel->insert([
            'judul'           => $judul,
            'slug'            => $slug,
            'kategori'        => $this->request->getPost('kategori'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai') ?: null,
            'jam_mulai'       => $this->request->getPost('jam_mulai'),
            'jam_selesai'     => $this->request->getPost('jam_selesai'),
            'lokasi'          => $this->request->getPost('lokasi'),
            'penyelenggara'   => $this->request->getPost('penyelenggara'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $agendaModel = new AgendaModel();
        $item = $agendaModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/agenda')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/agenda/form', [
            'title' => 'Edit Agenda Kegiatan',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $agendaModel = new AgendaModel();
        $data = [
            'judul'           => $this->request->getPost('judul'),
            'kategori'        => $this->request->getPost('kategori'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai') ?: null,
            'jam_mulai'       => $this->request->getPost('jam_mulai'),
            'jam_selesai'     => $this->request->getPost('jam_selesai'),
            'lokasi'          => $this->request->getPost('lokasi'),
            'penyelenggara'   => $this->request->getPost('penyelenggara'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'status'          => $this->request->getPost('status'),
        ];

        $agendaModel->update($id, $data);
        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function delete($id)
    {
        $agendaModel = new AgendaModel();
        $agendaModel->delete($id);
        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil dihapus!');
    }
}
