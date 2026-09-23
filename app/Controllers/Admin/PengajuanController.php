<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengajuanLayananModel;

class PengajuanController extends BaseController
{
    protected $pengajuanModel;

    public function __construct()
    {
        $this->pengajuanModel = new PengajuanLayananModel();
    }

    public function index()
    {
        $status = $this->request->getGet('status');

        $data = [
            'title'         => 'Pengajuan Layanan Masyarakat',
            'pengajuanList' => $this->pengajuanModel->getAllWithLayanan(50, 0, $status),
            'activeStatus'  => $status,
        ];

        return view('admin/pengajuan/index', $data);
    }

    public function detail(int $id)
    {
        $pengajuan = $this->pengajuanModel->select('pengajuan_layanan.*, layanan.nama_layanan, layanan.biaya, layanan.estimasi_waktu')
                                          ->join('layanan', 'layanan.id = pengajuan_layanan.layanan_id', 'left')
                                          ->where('pengajuan_layanan.id', $id)
                                          ->first();

        if (! $pengajuan) {
            return redirect()->to(base_url('admin/pengajuan'))->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $data = [
            'title'     => 'Detail Pengajuan: ' . $pengajuan['nomor_tiket'],
            'pengajuan' => $pengajuan,
        ];

        return view('admin/pengajuan/detail', $data);
    }

    public function updateStatus(int $id)
    {
        $pengajuan = $this->pengajuanModel->find($id);
        if (! $pengajuan) {
            return redirect()->to(base_url('admin/pengajuan'))->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $rules = [
            'status'          => 'required|in_list[diajukan,diperiksa,diproses,disetujui,ditolak,selesai]',
            'tanggapan_admin' => 'permit_empty|max_length[1000]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Status pengajuan tidak valid.');
        }

        $this->pengajuanModel->update($id, [
            'status'          => (string) $this->request->getPost('status'),
            'tanggapan_admin' => (string) $this->request->getPost('tanggapan_admin'),
        ]);

        return redirect()->to(base_url('admin/pengajuan/detail/' . $id))->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $pengajuan = $this->pengajuanModel->find($id);
        if (! $pengajuan) {
            return redirect()->to(base_url('admin/pengajuan'))->with('error', 'Data pengajuan tidak ditemukan.');
        }

        if (! empty($pengajuan['berkas']) && file_exists(FCPATH . $pengajuan['berkas'])) {
            @unlink(FCPATH . $pengajuan['berkas']);
        }

        $this->pengajuanModel->delete($id);
        return redirect()->to(base_url('admin/pengajuan'))->with('success', 'Pengajuan berhasil dihapus.');
    }
}
