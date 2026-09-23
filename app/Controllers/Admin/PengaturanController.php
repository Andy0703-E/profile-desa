<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class PengaturanController extends BaseController
{
    protected $pengaturanModel;

    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Pengaturan Website Profil Desa',
            'settings' => $this->pengaturanModel->getMap(),
        ];

        return view('admin/pengaturan/index', $data);
    }

    public function update()
    {
        $settings = $this->request->getPost('settings');

        if (is_array($settings)) {
            foreach ($settings as $key => $val) {
                $existing = $this->pengaturanModel->where('key_name', $key)->first();
                if ($existing) {
                    $this->pengaturanModel->update($existing['id'], ['val' => (string) $val]);
                } else {
                    $this->pengaturanModel->insert(['key_name' => $key, 'val' => (string) $val]);
                }
            }
        }

        return redirect()->to(base_url('admin/pengaturan'))->with('success', 'Pengaturan sistem berhasil disimpan.');
    }
}
