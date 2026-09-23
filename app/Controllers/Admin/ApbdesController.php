<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ApbdesModel;
use App\Models\ApbdesRincianModel;

class ApbdesController extends BaseController
{
    public function index()
    {
        $apbdesModel = new ApbdesModel();
        $list = $apbdesModel->orderBy('tahun', 'DESC')->findAll();

        $data = [
            'title' => 'Kelola APBDes & Transparansi Keuangan',
            'list'  => $list,
        ];

        return view('admin/apbdes/index', $data);
    }

    public function create()
    {
        return view('admin/apbdes/form', [
            'title' => 'Tambah APBDes',
            'item'  => null,
        ]);
    }

    public function store()
    {
        $apbdesModel = new ApbdesModel();

        $filePdf = null;
        $file = $this->request->getFile('file_pdf');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/dokumen', $newName);
            $filePdf = 'uploads/dokumen/' . $newName;
        }

        $id = $apbdesModel->insert([
            'tahun'                => $this->request->getPost('tahun'),
            'judul'                => $this->request->getPost('judul'),
            'jenis'                => $this->request->getPost('jenis'),
            'total_pendapatan'     => (int) str_replace(['.', ','], '', $this->request->getPost('total_pendapatan')),
            'realisasi_pendapatan' => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_pendapatan')),
            'total_belanja'        => (int) str_replace(['.', ','], '', $this->request->getPost('total_belanja')),
            'realisasi_belanja'    => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_belanja')),
            'total_pembiayaan'     => (int) str_replace(['.', ','], '', $this->request->getPost('total_pembiayaan')),
            'realisasi_pembiayaan' => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_pembiayaan')),
            'file_pdf'             => $filePdf,
            'status'               => $this->request->getPost('status') ?? 'final',
            'keterangan'           => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/apbdes/detail/' . $id)->with('success', 'Data APBDes berhasil disimpan! Silakan kelola rincian item rekening.');
    }

    public function edit($id)
    {
        $apbdesModel = new ApbdesModel();
        $item = $apbdesModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/apbdes')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/apbdes/form', [
            'title' => 'Edit APBDes',
            'item'  => $item,
        ]);
    }

    public function update($id)
    {
        $apbdesModel = new ApbdesModel();
        $item = $apbdesModel->find($id);

        $data = [
            'tahun'                => $this->request->getPost('tahun'),
            'judul'                => $this->request->getPost('judul'),
            'jenis'                => $this->request->getPost('jenis'),
            'total_pendapatan'     => (int) str_replace(['.', ','], '', $this->request->getPost('total_pendapatan')),
            'realisasi_pendapatan' => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_pendapatan')),
            'total_belanja'        => (int) str_replace(['.', ','], '', $this->request->getPost('total_belanja')),
            'realisasi_belanja'    => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_belanja')),
            'total_pembiayaan'     => (int) str_replace(['.', ','], '', $this->request->getPost('total_pembiayaan')),
            'realisasi_pembiayaan' => (int) str_replace(['.', ','], '', $this->request->getPost('realisasi_pembiayaan')),
            'status'               => $this->request->getPost('status') ?? 'final',
            'keterangan'           => $this->request->getPost('keterangan'),
        ];

        $file = $this->request->getFile('file_pdf');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/dokumen', $newName);
            $data['file_pdf'] = 'uploads/dokumen/' . $newName;
        }

        $apbdesModel->update($id, $data);
        return redirect()->to('/admin/apbdes')->with('success', 'Data APBDes berhasil diperbarui!');
    }

    public function detail($id)
    {
        $apbdesModel = new ApbdesModel();
        $rincianModel = new ApbdesRincianModel();

        $apbdes = $apbdesModel->find($id);
        if (!$apbdes) {
            return redirect()->to('/admin/apbdes')->with('error', 'Data tidak ditemukan');
        }

        $rincian = $rincianModel->getByApbdes($id);

        return view('admin/apbdes/detail', [
            'title'   => 'Rincian APBDes ' . esc($apbdes['judul']),
            'apbdes'  => $apbdes,
            'rincian' => $rincian,
        ]);
    }

    public function storeRincian($apbdesId)
    {
        $rincianModel = new ApbdesRincianModel();
        $anggaran = (int) str_replace(['.', ','], '', $this->request->getPost('anggaran'));
        $realisasi = (int) str_replace(['.', ','], '', $this->request->getPost('realisasi'));
        $persen = $anggaran > 0 ? round(($realisasi / $anggaran) * 100, 2) : 0;

        $rincianModel->insert([
            'apbdes_id'     => $apbdesId,
            'tipe'          => $this->request->getPost('tipe'),
            'kode_rekening' => $this->request->getPost('kode_rekening'),
            'uraian'        => $this->request->getPost('uraian'),
            'anggaran'      => $anggaran,
            'realisasi'     => $realisasi,
            'persentase'    => $persen,
        ]);

        return redirect()->to('/admin/apbdes/detail/' . $apbdesId)->with('success', 'Rincian berhasil ditambahkan!');
    }

    public function deleteRincian($id)
    {
        $rincianModel = new ApbdesRincianModel();
        $row = $rincianModel->find($id);
        if ($row) {
            $apbdesId = $row['apbdes_id'];
            $rincianModel->delete($id);
            return redirect()->to('/admin/apbdes/detail/' . $apbdesId)->with('success', 'Rincian berhasil dihapus!');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $apbdesModel = new ApbdesModel();
        $apbdesModel->delete($id);
        return redirect()->to('/admin/apbdes')->with('success', 'Data APBDes berhasil dihapus!');
    }
}
