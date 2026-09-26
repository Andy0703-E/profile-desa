<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\PengaduanModel;

class PengaduanController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $pengaduanModel = new PengaduanModel();

        $data = [
            'title'       => 'Layanan Pengaduan & Aspirasi Warga',
            'desa'        => $desaModel->getInfo(),
            'aduanPublik' => $pengaduanModel->orderBy('id', 'DESC')->limit(10)->findAll(),
        ];

        return view('pengaduan/index', $data);
    }

    public function kirim()
    {
        $pengaduanModel = new PengaduanModel();

        $rules = [
            'nama_pelapor' => 'required|min_length[3]|max_length[150]',
            'nik'          => 'permit_empty|numeric|exact_length[16]',
            'no_hp'        => 'required|min_length[8]|max_length[50]',
            'dusun'        => 'required|max_length[100]',
            'kategori'     => 'required|max_length[100]',
            'judul'        => 'required|min_length[5]|max_length[255]',
            'isi_aduan'    => 'required|min_length[10]',
            'foto_bukti'   => 'permit_empty|max_size[foto_bukti,3072]|ext_in[foto_bukti,jpg,jpeg,png,webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoName = null;
        $foto = $this->request->getFile('foto_bukti');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/pengaduan', $fotoName);
            $fotoName = 'uploads/pengaduan/' . $fotoName;
        }

        $kodeTiket = $pengaduanModel->generateKodeTiket();

        $pengaduanModel->insert([
            'kode_tiket'   => $kodeTiket,
            'nama_pelapor' => strip_tags(trim((string) $this->request->getPost('nama_pelapor'))),
            'nik'          => strip_tags(trim((string) $this->request->getPost('nik'))),
            'no_hp'        => strip_tags(trim((string) $this->request->getPost('no_hp'))),
            'dusun'        => strip_tags(trim((string) $this->request->getPost('dusun'))),
            'kategori'     => strip_tags(trim((string) $this->request->getPost('kategori'))),
            'judul'        => strip_tags(trim((string) $this->request->getPost('judul'))),
            'isi_aduan'    => strip_tags(trim((string) $this->request->getPost('isi_aduan'))),
            'foto_bukti'   => $fotoName,
            'status'       => 'diajukan',
        ]);

        return redirect()->to('/pengaduan/status?tiket=' . $kodeTiket)
                         ->with('success', 'Pengaduan berhasil dikirim! Simpan Kode Tiket Anda: ' . $kodeTiket);
    }

    public function status()
    {
        $desaModel = new DesaModel();
        $pengaduanModel = new PengaduanModel();

        $tiket = $this->request->getGet('tiket');
        $laporan = null;
        if ($tiket) {
            $laporan = $pengaduanModel->where('kode_tiket', trim($tiket))->first();
        }

        $data = [
            'title'   => 'Cek Status Pengaduan Warga',
            'desa'    => $desaModel->getInfo(),
            'laporan' => $laporan,
            'tiket'   => $tiket,
        ];

        return view('pengaduan/status', $data);
    }
}
