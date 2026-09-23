<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class PengaduanController extends BaseController
{
    public function index()
    {
        $pengaduanModel = new PengaduanModel();
        $status = $this->request->getGet('status');

        $builder = $pengaduanModel->orderBy('id', 'DESC');
        if ($status && $status !== 'semua') {
            $builder->where('status', $status);
        }

        $list = $builder->findAll();

        return view('admin/pengaduan/index', [
            'title'          => 'Kelola Pengaduan Warga',
            'list'           => $list,
            'selectedStatus' => $status ?? 'semua',
        ]);
    }

    public function detail($id)
    {
        $pengaduanModel = new PengaduanModel();
        $item = $pengaduanModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/pengaduan/detail', [
            'title' => 'Detail Pengaduan: ' . esc($item['kode_tiket']),
            'item'  => $item,
        ]);
    }

    public function tanggapi($id)
    {
        $pengaduanModel = new PengaduanModel();
        $item = $pengaduanModel->find($id);
        if (!$item) {
            return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan');
        }

        $pengaduanModel->update($id, [
            'status'            => $this->request->getPost('status'),
            'tanggapan'         => $this->request->getPost('tanggapan'),
            'tanggal_tanggapan' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/pengaduan/detail/' . $id)->with('success', 'Tanggapan berhasil disimpan!');
    }

    public function delete($id)
    {
        $pengaduanModel = new PengaduanModel();
        $pengaduanModel->delete($id);
        return redirect()->to('/admin/pengaduan')->with('success', 'Laporan berhasil dihapus!');
    }
}
