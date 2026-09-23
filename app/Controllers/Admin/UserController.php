<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Manajemen Pengguna Admin',
            'userList' => $this->userModel->findAll(),
        ];

        return view('admin/users/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah User Admin'];
        return view('admin/users/form', $data);
    }

    public function store()
    {
        $rules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email'    => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[superadmin,admin]',
            'status'   => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'name'          => (string) $this->request->getPost('name'),
            'username'      => (string) $this->request->getPost('username'),
            'email'         => (string) $this->request->getPost('email'),
            'password_hash' => password_hash((string) $this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'          => (string) $this->request->getPost('role'),
            'status'        => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/users'))->with('success', 'User admin baru berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Pengguna Admin',
            'user'  => $user,
        ];

        return view('admin/users/form', $data);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'User tidak ditemukan.');
        }

        $rules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'username' => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|max_length[100]|is_unique[users.email,id,{$id}]",
            'password' => 'permit_empty|min_length[6]',
            'role'     => 'required|in_list[superadmin,admin]',
            'status'   => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userData = [
            'name'     => (string) $this->request->getPost('name'),
            'username' => (string) $this->request->getPost('username'),
            'email'    => (string) $this->request->getPost('email'),
            'role'     => (string) $this->request->getPost('role'),
            'status'   => (string) $this->request->getPost('status'),
        ];

        $password = (string) $this->request->getPost('password');
        if (! empty($password)) {
            $userData['password_hash'] = password_hash($password, PASSWORD_BCRYPT);
        }

        $this->userModel->update($id, $userData);
        return redirect()->to(base_url('admin/users'))->with('success', 'User admin berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        if ($id === (int) session('userId')) {
            return redirect()->to(base_url('admin/users'))->with('error', 'Tidak dapat menghapus akun yang sedang aktif digunakan.');
        }

        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/users'))->with('success', 'User berhasil dihapus.');
    }
}
