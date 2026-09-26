<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataPendudukModel;
use App\Models\DataStatistikModel;

class DataDesaController extends BaseController
{
    protected $pendudukModel;
    protected $statistikModel;

    public function __construct()
    {
        $this->pendudukModel = new DataPendudukModel();
        $this->statistikModel = new DataStatistikModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Data & Statistik Desa',
            'pendudukList'  => $this->pendudukModel->orderBy('kategori', 'ASC')->orderBy('urutan', 'ASC')->findAll(),
            'statistikList' => $this->statistikModel->orderBy('urutan', 'ASC')->findAll(),
        ];

        return view('admin/data_desa/index', $data);
    }

    public function storePenduduk()
    {
        $rules = [
            'kategori' => 'required|max_length[100]',
            'label'    => 'required|max_length[150]',
            'jumlah'   => 'required|numeric',
            'urutan'   => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Data klasifikasi penduduk tidak valid.');
        }

        $this->pendudukModel->insert([
            'kategori'   => (string) $this->request->getPost('kategori'),
            'label'      => (string) $this->request->getPost('label'),
            'jumlah'     => (int) $this->request->getPost('jumlah'),
            'keterangan' => (string) $this->request->getPost('keterangan'),
            'urutan'     => (int) $this->request->getPost('urutan'),
        ]);

        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Data kependudukan berhasil ditambahkan.');
    }

    public function deletePenduduk(int $id)
    {
        $this->pendudukModel->delete($id);
        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Data berhasil dihapus.');
    }

    public function updateStatistik()
    {
        $rules = [
            'stats' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $stats = $this->request->getPost('stats');
        if (is_array($stats)) {
            foreach ($stats as $id => $val) {
                $this->statistikModel->update((int) $id, ['value' => (string) strip_tags(trim($val))]);
            }
        }

        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Statistik ringkas berhasil diperbarui.');
    }
}
