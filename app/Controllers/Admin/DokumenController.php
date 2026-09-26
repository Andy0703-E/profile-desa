<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenPublikModel;

class DokumenController extends BaseController
{
    public function index()
    {
        $dokumenModel = new DokumenPublikModel();
        $list = $dokumenModel->orderBy('tahun', 'DESC')->orderBy('id', 'DESC')->findAll();

        return view('admin/dokumen/index', [
            'title' => 'Kelola Informasi Publik & Dokumen Desa',
            'list'  => $list,
        ]);
    }

    public function create()
    {
        return view('admin/dokumen/form', [
            'title' => 'Tambah Dokumen Desa',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $rules = [
            'judul'         => 'required|min_length[3]|max_length[255]',
            'nomor_dokumen' => 'permit_empty|max_length[100]',
            'kategori'      => 'required|max_length[100]',
            'tahun'         => 'required|numeric|exact_length[4]',
            'deskripsi'     => 'permit_empty',
            'file_dokumen'  => 'permit_empty|max_size[file_dokumen,10240]|ext_in[file_dokumen,pdf,doc,docx,xls,xlsx]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dokumenModel = new DokumenPublikModel();

        $filePath = null;
        $fileSize = null;
        $file = $this->request->getFile('file_dokumen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $fileSize = round($file->getSize() / 1024, 1) . ' KB';
            if ($file->getSize() > 1048576) {
                $fileSize = round($file->getSize() / 1048576, 2) . ' MB';
            }
            $file->move(FCPATH . 'uploads/dokumen', $newName);
            $filePath = 'uploads/dokumen/' . $newName;
        }

        $dokumenModel->insert([
            'judul'          => (string) $this->request->getPost('judul'),
            'nomor_dokumen'  => (string) $this->request->getPost('nomor_dokumen'),
            'kategori'       => (string) $this->request->getPost('kategori'),
            'tahun'          => (string) $this->request->getPost('tahun'),
            'deskripsi'      => (string) $this->request->getPost('deskripsi'),
            'file_url'       => $filePath ?? 'uploads/dokumen/dummy.pdf',
            'ukuran_file'    => $fileSize ?? '1.2 MB',
            'total_download' => 0,
        ]);

        return redirect()->to(base_url('admin/dokumen'))->with('success', 'Dokumen berhasil dipublikasikan!');
    }

    public function edit($id)
    {
        $dokumenModel = new DokumenPublikModel();
        $item = $dokumenModel->find($id);
        if (!$item) {
            return redirect()->to(base_url('admin/dokumen'))->with('error', 'Data tidak ditemukan');
        }

        return view('admin/dokumen/form', [
            'title' => 'Edit Dokumen Desa',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'judul'         => 'required|min_length[3]|max_length[255]',
            'nomor_dokumen' => 'permit_empty|max_length[100]',
            'kategori'      => 'required|max_length[100]',
            'tahun'         => 'required|numeric|exact_length[4]',
            'deskripsi'     => 'permit_empty',
            'file_dokumen'  => 'permit_empty|max_size[file_dokumen,10240]|ext_in[file_dokumen,pdf,doc,docx,xls,xlsx]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dokumenModel = new DokumenPublikModel();
        $data = [
            'judul'         => (string) $this->request->getPost('judul'),
            'nomor_dokumen' => (string) $this->request->getPost('nomor_dokumen'),
            'kategori'      => (string) $this->request->getPost('kategori'),
            'tahun'         => (string) $this->request->getPost('tahun'),
            'deskripsi'     => (string) $this->request->getPost('deskripsi'),
        ];

        $file = $this->request->getFile('file_dokumen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $fileSize = round($file->getSize() / 1024, 1) . ' KB';
            if ($file->getSize() > 1048576) {
                $fileSize = round($file->getSize() / 1048576, 2) . ' MB';
            }
            $file->move(FCPATH . 'uploads/dokumen', $newName);
            $data['file_url'] = 'uploads/dokumen/' . $newName;
            $data['ukuran_file'] = $fileSize;
        }

        $dokumenModel->update($id, $data);
        return redirect()->to(base_url('admin/dokumen'))->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function delete($id)
    {
        $dokumenModel = new DokumenPublikModel();
        $dokumenModel->delete($id);
        return redirect()->to('/admin/dokumen')->with('success', 'Dokumen berhasil dihapus!');
    }
}
