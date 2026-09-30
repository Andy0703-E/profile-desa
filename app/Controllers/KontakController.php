<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\KontakModel;

class KontakController extends BaseController
{
    public function index()
    {
        $desaModel = new DesaModel();

        $data = [
            'title' => 'Hubungi Kami',
            'desa'  => $desaModel->getInfo(),
        ];

        return view('kontak/index', $data);
    }

    public function kirim()
    {
        $rules = [
            'nama'   => 'required|min_length[3]|max_length[150]',
            'email'  => 'permit_empty|valid_email|max_length[100]',
            'no_hp'  => 'permit_empty|min_length[8]|max_length[20]',
            'subjek' => 'required|min_length[3]|max_length[255]',
            'pesan'  => 'required|min_length[5]',
        ];

        $messages = [
            'nama'   => ['required' => 'Nama lengkap wajib diisi.'],
            'email'  => ['valid_email' => 'Format email tidak valid.'],
            'subjek' => ['required' => 'Subjek pesan wajib diisi.'],
            'pesan'  => ['required' => 'Pesan tidak boleh kosong.', 'min_length' => 'Pesan minimal 5 karakter.'],
        ];

        if (! $this->validate($rules, $messages)) {
            if ($this->request->isAJAX()) {
                return $this->response->setStatusCode(422)->setJSON([
                    'status' => 'error',
                    'errors' => $this->validator->getErrors(),
                ]);
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = (string) $this->request->getPost('email');
        if (empty($email)) {
            $email = '-';
        }

        $kontakModel = new KontakModel();
        $kontakModel->insert([
            'nama'   => (string) $this->request->getPost('nama'),
            'email'  => $email,
            'no_hp'  => (string) $this->request->getPost('no_hp'),
            'subjek' => (string) $this->request->getPost('subjek'),
            'pesan'  => (string) $this->request->getPost('pesan'),
            'status' => 'belum_dibaca',
        ]);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Pesan & aspirasi Anda berhasil dikirim ke Kantor Desa Batu Bingkung. Terima kasih!',
            ]);
        }

        return redirect()->to(base_url('kontak'))->with('success', 'Pesan Anda berhasil dikirim ke Kantor Desa Batu Bingkung. Terima kasih!');
    }
}
