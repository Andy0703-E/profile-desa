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
        $rules = [
            'settings' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $settings = $this->request->getPost('settings');

        if (is_array($settings)) {
            foreach ($settings as $key => $val) {
                $cleanKey = strip_tags(trim((string) $key));
                $cleanVal = strip_tags(trim((string) $val));
                $existing = $this->pengaturanModel->where('key_name', $cleanKey)->first();
                if ($existing) {
                    $this->pengaturanModel->update($existing['id'], ['val' => $cleanVal]);
                } else {
                    $this->pengaturanModel->insert(['key_name' => $cleanKey, 'val' => $cleanVal]);
                }
            }
        }

        return redirect()->to(base_url('admin/pengaturan'))->with('success', 'Pengaturan sistem berhasil disimpan.');
    }
}
