<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\ProfilDesaModel;

class ProfilController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();
        $profilModel = new ProfilDesaModel();

        $data = [
            'title'  => 'Manajemen Profil Desa',
            'desa'   => $desaModel->getInfo(),
            'profil' => $profilModel->getProfil(),
        ];

        return view('admin/profil/index', $data);
    }

    public function update()
    {
        $rules = [
            'nama_desa'       => 'required|min_length[3]|max_length[150]',
            'slogan'          => 'permit_empty|max_length[255]',
            'motto'           => 'permit_empty|max_length[255]',
            'jumlah_penduduk' => 'permit_empty|numeric',
            'jumlah_kk'       => 'permit_empty|numeric',
            'email'           => 'permit_empty|valid_email|max_length[100]',
            'telepon'         => 'permit_empty|max_length[50]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $desaModel = new DesaModel();
        $profilModel = new ProfilDesaModel();

        // 1. Update Tabel Desa
        $desaData = [
            'nama_desa'       => (string) $this->request->getPost('nama_desa'),
            'slogan'          => (string) $this->request->getPost('slogan'),
            'motto'           => (string) $this->request->getPost('motto'),
            'deskripsi'       => (string) $this->request->getPost('deskripsi'),
            'luas_wilayah'    => (string) $this->request->getPost('luas_wilayah'),
            'jumlah_penduduk' => (int) $this->request->getPost('jumlah_penduduk'),
            'jumlah_kk'       => (int) $this->request->getPost('jumlah_kk'),
            'alamat'          => (string) $this->request->getPost('alamat'),
            'telepon'         => (string) $this->request->getPost('telepon'),
            'email'           => (string) $this->request->getPost('email'),
            'jam_pelayanan'   => (string) $this->request->getPost('jam_pelayanan'),
        ];
        
        $desa = $desaModel->getInfo();
        if ($desa) {
            $desaModel->update($desa['id'], $desaData);
        } else {
            $desaModel->insert($desaData);
        }

        // 2. Update Tabel Profil Desa
        $profilData = [
            'sejarah'       => (string) $this->request->getPost('sejarah'),
            'visi'          => (string) $this->request->getPost('visi'),
            'misi'          => (string) $this->request->getPost('misi'),
            'geografis'     => (string) $this->request->getPost('geografis'),
            'demografis'    => (string) $this->request->getPost('demografis'),
            'batas_utara'   => (string) $this->request->getPost('batas_utara'),
            'batas_selatan' => (string) $this->request->getPost('batas_selatan'),
            'batas_timur'   => (string) $this->request->getPost('batas_timur'),
            'batas_barat'   => (string) $this->request->getPost('batas_barat'),
        ];
        
        $profil = $profilModel->getProfil();
        if ($profil) {
            $profilModel->update($profil['id'], $profilData);
        } else {
            $profilModel->insert($profilData);
        }

        return redirect()->to(base_url('admin/profil'))->with('success', 'Profil desa berhasil diperbarui.');
    }
}
