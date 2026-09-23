<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class KontakController extends BaseController
{
    protected $kontakModel;

    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Kotak Pesan & Aspirasi Masuk',
            'pesanList'  => $this->kontakModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/kontak/index', $data);
    }

    public function delete(int $id)
    {
        $this->kontakModel->delete($id);
        return redirect()->to(base_url('admin/kontak'))->with('success', 'Pesan berhasil dihapus.');
    }
}
