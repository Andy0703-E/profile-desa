<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\LayananModel;
use App\Models\PersyaratanLayananModel;
use App\Models\PengajuanLayananModel;

class LayananController extends BaseController
{
    protected $desaModel;
    protected $layananModel;
    protected $persyaratanModel;
    protected $pengajuanModel;

    public function __construct()
    {
        $this->desaModel = new DesaModel();
        $this->layananModel = new LayananModel();
        $this->persyaratanModel = new PersyaratanLayananModel();
        $this->pengajuanModel = new PengajuanLayananModel();
    }

    public function index()
    {
        $data = [
            'title'       => 'Layanan Publik',
            'desa'        => $this->desaModel->getInfo(),
            'layananList' => $this->layananModel->getActive(),
        ];

        return view('layanan/index', $data);
    }

    public function detail(string $slug)
    {
        $layanan = $this->layananModel->where('slug', $slug)->where('status', 'aktif')->first();

        if (! $layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Layanan tidak ditemukan.');
        }

        $data = [
            'title'            => $layanan['nama_layanan'],
            'desa'             => $this->desaModel->getInfo(),
            'layanan'          => $layanan,
            'persyaratanList'  => $this->persyaratanModel->getByLayanan((int) $layanan['id']),
        ];

        return view('layanan/detail', $data);
    }

    public function ajukan(string $slug)
    {
        $layanan = $this->layananModel->where('slug', $slug)->where('status', 'aktif')->first();

        if (! $layanan) {
            return redirect()->to(base_url('layanan'))->with('error', 'Layanan tidak ditemukan.');
        }

        $rules = [
            'nama_pemohon' => 'required|min_length[3]|max_length[150]',
            'nik'          => 'required|numeric|min_length[16]|max_length[16]',
            'no_hp'        => 'required|min_length[10]|max_length[20]',
            'email'        => 'permit_empty|valid_email|max_length[100]',
            'alamat'       => 'required|min_length[5]',
            'catatan'      => 'permit_empty|max_length[500]',
            'berkas'       => 'permit_empty|uploaded[berkas]|max_size[berkas,5120]|ext_in[berkas,pdf,jpg,jpeg,png]',
        ];

        $messages = [
            'nama_pemohon' => [
                'required'   => 'Nama pemohon wajib diisi.',
                'min_length' => 'Nama pemohon minimal 3 karakter.',
            ],
            'nik' => [
                'required'   => 'NIK wajib diisi.',
                'numeric'    => 'NIK harus berupa 16 digit angka.',
                'min_length' => 'NIK harus berjumlah 16 digit.',
                'max_length' => 'NIK harus berjumlah 16 digit.',
            ],
            'no_hp' => [
                'required'   => 'Nomor WhatsApp / HP wajib diisi untuk konfirmasi.',
            ],
            'alamat' => [
                'required'   => 'Alamat domisili wajib diisi.',
            ],
            'berkas' => [
                'max_size'   => 'Ukuran berkas maksimal 5MB.',
                'ext_in'     => 'Format berkas harus PDF, JPG, atau PNG.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload safely
        $berkasFile = $this->request->getFile('berkas');
        $berkasName = null;

        if ($berkasFile && $berkasFile->isValid() && ! $berkasFile->hasMoved()) {
            $berkasName = $berkasFile->getRandomName();
            $berkasFile->move(FCPATH . 'uploads/pengajuan', $berkasName);
        }

        // Generate unique tracking ticket
        $nomorTiket = 'BBK-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        $this->pengajuanModel->insert([
            'nomor_tiket'     => $nomorTiket,
            'layanan_id'      => $layanan['id'],
            'nama_pemohon'    => (string) $this->request->getPost('nama_pemohon'),
            'nik'             => (string) $this->request->getPost('nik'),
            'no_hp'           => (string) $this->request->getPost('no_hp'),
            'email'           => (string) $this->request->getPost('email'),
            'alamat'          => (string) $this->request->getPost('alamat'),
            'catatan'         => (string) $this->request->getPost('catatan'),
            'berkas'          => $berkasName ? 'uploads/pengajuan/' . $berkasName : null,
            'status'          => 'diajukan',
            'tanggapan_admin' => 'Pengajuan berhasil diterima oleh sistem. Menunggu pemeriksaan oleh petugas desa.',
        ]);

        return redirect()->to(base_url('layanan/cek-status?tiket=' . $nomorTiket))->with('success', 'Pengajuan berhasil dikirim! Simpan Nomor Tiket Anda: ' . $nomorTiket);
    }

    public function cekStatus()
    {
        $tiket = (string) $this->request->getGet('tiket');
        $pengajuan = null;

        if ($tiket) {
            $pengajuan = $this->pengajuanModel->findByTiket(trim($tiket));
        }

        $data = [
            'title'     => 'Cek Status Pengajuan',
            'desa'      => $this->desaModel->getInfo(),
            'tiket'     => $tiket,
            'pengajuan' => $pengajuan,
        ];

        return view('layanan/cek_status', $data);
    }
}
