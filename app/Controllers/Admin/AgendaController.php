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
        $rules = [
            'judul'           => 'required|min_length[3]|max_length[255]',
            'kategori'        => 'required|max_length[100]',
            'tanggal_mulai'   => 'required|valid_date[Y-m-d]',
            'tanggal_selesai' => 'permit_empty|valid_date[Y-m-d]',
            'jam_mulai'       => 'permit_empty|max_length[20]',
            'jam_selesai'     => 'permit_empty|max_length[20]',
            'lokasi'          => 'required|max_length[255]',
            'penyelenggara'   => 'permit_empty|max_length[150]',
            'deskripsi'       => 'permit_empty',
            'status'          => 'required|in_list[akan_datang,berlangsung,selesai]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $agendaModel = new AgendaModel();
        $judul = (string) $this->request->getPost('judul');
        $slug = url_title($judul, '-', true) . '-' . time();

        $agendaModel->insert([
            'judul'           => $judul,
            'slug'            => $slug,
            'kategori'        => (string) $this->request->getPost('kategori'),
            'tanggal_mulai'   => (string) $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai') ?: null,
            'jam_mulai'       => (string) $this->request->getPost('jam_mulai'),
            'jam_selesai'     => (string) $this->request->getPost('jam_selesai'),
            'lokasi'          => (string) $this->request->getPost('lokasi'),
            'penyelenggara'   => (string) $this->request->getPost('penyelenggara'),
            'deskripsi'       => (string) $this->request->getPost('deskripsi'),
            'status'          => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/agenda'))->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $agendaModel = new AgendaModel();
        $item = $agendaModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/agenda'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/agenda/form', [
            'title' => 'Edit Agenda Kegiatan',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'judul'           => 'required|min_length[3]|max_length[255]',
            'kategori'        => 'required|max_length[100]',
            'tanggal_mulai'   => 'required|valid_date[Y-m-d]',
            'tanggal_selesai' => 'permit_empty|valid_date[Y-m-d]',
            'jam_mulai'       => 'permit_empty|max_length[20]',
            'jam_selesai'     => 'permit_empty|max_length[20]',
            'lokasi'          => 'required|max_length[255]',
            'penyelenggara'   => 'permit_empty|max_length[150]',
            'deskripsi'       => 'permit_empty',
            'status'          => 'required|in_list[akan_datang,berlangsung,selesai]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $agendaModel = new AgendaModel();
        $data = [
            'judul'           => (string) $this->request->getPost('judul'),
            'kategori'        => (string) $this->request->getPost('kategori'),
            'tanggal_mulai'   => (string) $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai') ?: null,
            'jam_mulai'       => (string) $this->request->getPost('jam_mulai'),
            'jam_selesai'     => (string) $this->request->getPost('jam_selesai'),
            'lokasi'          => (string) $this->request->getPost('lokasi'),
            'penyelenggara'   => (string) $this->request->getPost('penyelenggara'),
            'deskripsi'       => (string) $this->request->getPost('deskripsi'),
            'status'          => (string) $this->request->getPost('status'),
        ];

        $agendaModel->update($id, $data);
        return redirect()->to(base_url('admin/agenda'))->with('success', 'Agenda berhasil diperbarui!');
    }

    public function delete($id)
    {
        $agendaModel = new AgendaModel();
        $agendaModel->delete($id);
        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil dihapus!');
    }
}
