<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemerintahanModel;

class PemerintahanController extends BaseController
{
    protected $pemerintahanModel;

    public function __construct()
    {
        $this->pemerintahanModel = new PemerintahanModel();
    }

    public function index()
    {
        $data = [
            'title'        => 'Struktur Aparatur Pemerintahan',
            'aparaturList' => $this->pemerintahanModel->orderBy('urutan', 'ASC')->findAll(),
        ];

        return view('admin/pemerintahan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Aparatur Desa',
        ];

        return view('admin/pemerintahan/form', $data);
    }

    public function store()
    {
        $rules = [
            'nama'      => 'required|min_length[3]|max_length[150]',
            'jabatan'   => 'required|max_length[150]',
            'nip'       => 'permit_empty|max_length[50]',
            'urutan'    => 'required|numeric',
            'deskripsi' => 'permit_empty',
            'status'    => 'required|in_list[aktif,tidak_aktif]',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoPath = null;
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/perangkat', $newName);
            $fotoPath = 'uploads/perangkat/' . $newName;
        }

        $this->pemerintahanModel->insert([
            'nama'      => (string) $this->request->getPost('nama'),
            'jabatan'   => (string) $this->request->getPost('jabatan'),
            'nip'       => (string) $this->request->getPost('nip'),
            'urutan'    => (int) $this->request->getPost('urutan'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'status'    => (string) $this->request->getPost('status'),
            'foto'      => $fotoPath,
        ]);

        return redirect()->to(base_url('admin/pemerintahan'))->with('success', 'Data aparatur berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $aparatur = $this->pemerintahanModel->find($id);

        if (! $aparatur) {
            return redirect()->to(base_url('admin/pemerintahan'))->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'    => 'Edit Aparatur Desa',
            'aparatur' => $aparatur,
        ];

        return view('admin/pemerintahan/form', $data);
    }

    public function update(int $id)
    {
        $aparatur = $this->pemerintahanModel->find($id);
        if (! $aparatur) {
            return redirect()->to(base_url('admin/pemerintahan'))->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'nama'      => 'required|min_length[3]|max_length[150]',
            'jabatan'   => 'required|max_length[150]',
            'nip'       => 'permit_empty|max_length[50]',
            'urutan'    => 'required|numeric',
            'deskripsi' => 'permit_empty',
            'status'    => 'required|in_list[aktif,tidak_aktif]',
            'foto'      => 'permit_empty|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoPath = $aparatur['foto'];
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/perangkat', $newName);
            $fotoPath = 'uploads/perangkat/' . $newName;

            if (! empty($aparatur['foto']) && file_exists(FCPATH . $aparatur['foto'])) {
                @unlink(FCPATH . $aparatur['foto']);
            }
        }

        $this->pemerintahanModel->update($id, [
            'nama'      => (string) $this->request->getPost('nama'),
            'jabatan'   => (string) $this->request->getPost('jabatan'),
            'nip'       => (string) $this->request->getPost('nip'),
            'urutan'    => (int) $this->request->getPost('urutan'),
            'deskripsi' => (string) $this->request->getPost('deskripsi'),
            'status'    => (string) $this->request->getPost('status'),
            'foto'      => $fotoPath,
        ]);

        return redirect()->to(base_url('admin/pemerintahan'))->with('success', 'Data aparatur berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $aparatur = $this->pemerintahanModel->find($id);
        if (! $aparatur) {
            return redirect()->to(base_url('admin/pemerintahan'))->with('error', 'Data tidak ditemukan.');
        }

        if (! empty($aparatur['foto']) && file_exists(FCPATH . $aparatur['foto'])) {
            @unlink(FCPATH . $aparatur['foto']);
        }

        $this->pemerintahanModel->delete($id);
        return redirect()->to(base_url('admin/pemerintahan'))->with('success', 'Data aparatur berhasil dihapus.');
    }
}
