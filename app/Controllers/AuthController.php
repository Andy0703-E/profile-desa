<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin'));
        }

        return view('auth/login', [
            'title' => 'Login Administrator - Desa Batu Bingkung',
        ]);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[6]',
        ];

        $messages = [
            'username' => [
                'required' => 'Username atau email wajib diisi.',
                'min_length' => 'Username minimal 3 karakter.',
            ],
            'password' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        $user = $this->userModel->findByUsername($username);

        if (! $user || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password tidak sesuai.');
        }

        if ($user['status'] !== 'active') {
            return redirect()->back()->with('error', 'Akun Anda sedang nonaktif. Silakan hubungi Administrator.');
        }

        // Regenerate session id for security
        session()->regenerate();

        session()->set([
            'userId'     => $user['id'],
            'userName'   => $user['name'],
            'userLogin'  => $user['username'],
            'userEmail'  => $user['email'],
            'userRole'   => $user['role'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to(base_url('admin'))->with('success', 'Selamat datang kembali, ' . esc($user['name']) . '!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'))->with('success', 'Anda telah berhasil keluar.');
    }
}
