<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProgramUnggulanModel;

class ProgramUnggulanController extends BaseController
{
    public function index()
    {
        $programModel = new ProgramUnggulanModel();
        $list = $programModel->orderBy('urutan', 'ASC')->findAll();

        return view('admin/program/index', [
            'title' => 'Kelola Program Unggulan Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/program/form', [
            'title' => 'Tambah Program Unggulan',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $rules = [
            'judul'     => 'required|min_length[3]|max_length[200]',
            'ringkasan' => 'permit_empty|max_length[500]',
            'deskripsi' => 'permit_empty',
            'icon'      => 'permit_empty|max_length[50]',
            'status'    => 'permit_empty|in_list[aktif,tidak_aktif]',
            'urutan'    => 'permit_empty|numeric',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $programModel = new ProgramUnggulanModel();

        $foto = $this->request->getFile('foto');
        $fotoPath = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $fotoPath = 'uploads/desa/' . $newName;
        }

        $programModel->insert([
            'judul'     => (string) $this->request->getPost('judul'),
            'ringkasan' => (string) $this->request->getPost('ringkasan'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'icon'      => (string) ($this->request->getPost('icon') ?? 'star'),
            'foto'      => $fotoPath,
            'status'    => (string) ($this->request->getPost('status') ?? 'aktif'),
            'urutan'    => (int) ($this->request->getPost('urutan') ?? 0),
        ]);

        return redirect()->to(base_url('admin/program-unggulan'))->with('success', 'Program unggulan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $programModel = new ProgramUnggulanModel();
        $item = $programModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/program-unggulan'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/program/form', [
            'title' => 'Edit Program Unggulan',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'judul'     => 'required|min_length[3]|max_length[200]',
            'ringkasan' => 'permit_empty|max_length[500]',
            'deskripsi' => 'permit_empty',
            'icon'      => 'permit_empty|max_length[50]',
            'status'    => 'permit_empty|in_list[aktif,tidak_aktif]',
            'urutan'    => 'permit_empty|numeric',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $programModel = new ProgramUnggulanModel();
        $data = [
            'judul'     => (string) $this->request->getPost('judul'),
            'ringkasan' => (string) $this->request->getPost('ringkasan'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'icon'      => (string) ($this->request->getPost('icon') ?? 'star'),
            'status'    => (string) ($this->request->getPost('status') ?? 'aktif'),
            'urutan'    => (int) ($this->request->getPost('urutan') ?? 0),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/desa', $newName);
            $data['foto'] = 'uploads/desa/' . $newName;
        }

        $programModel->update($id, $data);
        return redirect()->to(base_url('admin/program-unggulan'))->with('success', 'Program unggulan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $programModel = new ProgramUnggulanModel();
        $programModel->delete($id);
        return redirect()->to('/admin/program-unggulan')->with('success', 'Program unggulan berhasil dihapus!');
    }
}
