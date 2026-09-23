<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (! $session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Silakan login terlebih dahulu untuk mengakses halaman administrasi.');
            return redirect()->to(base_url('auth/login'));
        }

        if ($arguments && in_array('superadmin', $arguments, true)) {
            if ($session->get('userRole') !== 'superadmin') {
                $session->setFlashdata('error', 'Anda tidak memiliki akses ke area ini.');
                return redirect()->to(base_url('admin'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
