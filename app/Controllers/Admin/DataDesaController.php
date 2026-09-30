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
        $editId = (int) $this->request->getGet('edit_id');
        $editPenduduk = $editId > 0 ? $this->pendudukModel->find($editId) : null;

        $data = [
            'title'         => 'Data & Statistik Desa',
            'pendudukList'  => $this->pendudukModel->orderBy('kategori', 'ASC')->orderBy('urutan', 'ASC')->findAll(),
            'statistikList' => $this->statistikModel->orderBy('urutan', 'ASC')->findAll(),
            'editPenduduk'  => $editPenduduk,
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

    public function updatePenduduk(int $id)
    {
        $item = $this->pendudukModel->find($id);
        if (! $item) {
            return redirect()->to(base_url('admin/data-desa'))->with('error', 'Data klasifikasi tidak ditemukan.');
        }

        $rules = [
            'kategori' => 'required|max_length[100]',
            'label'    => 'required|max_length[150]',
            'jumlah'   => 'required|numeric',
            'urutan'   => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Data klasifikasi penduduk tidak valid.');
        }

        $this->pendudukModel->update($id, [
            'kategori'   => (string) $this->request->getPost('kategori'),
            'label'      => (string) $this->request->getPost('label'),
            'jumlah'     => (int) $this->request->getPost('jumlah'),
            'keterangan' => (string) $this->request->getPost('keterangan'),
            'urutan'     => (int) $this->request->getPost('urutan'),
        ]);

        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Data kependudukan berhasil diperbarui.');
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

    public function storeStatistik()
    {
        $rules = [
            'label'  => 'required|max_length[150]',
            'value'  => 'required|max_length[100]',
            'satuan' => 'permit_empty|max_length[50]',
            'urutan' => 'permit_empty|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Data indikator statistik tidak valid.');
        }

        $label = (string) $this->request->getPost('label');
        $keyName = url_title($label, '_', true);

        $this->statistikModel->insert([
            'key_name' => $keyName,
            'label'    => $label,
            'value'    => (string) $this->request->getPost('value'),
            'satuan'   => (string) $this->request->getPost('satuan'),
            'icon'     => 'bar-chart-2',
            'urutan'   => (int) ($this->request->getPost('urutan') ?: 1),
        ]);

        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Indikator statistik baru berhasil ditambahkan.');
    }

    public function deleteStatistik(int $id)
    {
        $this->statistikModel->delete($id);
        return redirect()->to(base_url('admin/data-desa'))->with('success', 'Indikator statistik berhasil dihapus.');
    }
}
