<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login'
        ];
        if (session()->get('username')) {
            session()->setFlashdata('gagal', 'Anda masih login, harap logout terlebih dahulu');
            return redirect()->to(base_url('Admin/PPDB'));
        }
        return view('Admin/login', $data);
    }
    public function cek_login()
    {
        $this->adminModel = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->adminModel->cek_login($username, $password);
        if ($cek) {
            session()->set('id_admin', $cek['id_admin']);
            session()->set('username', $cek['username']);
            session()->set('nama', $cek['nama']);
            return redirect()->to(base_url('Admin/PPDB'));
        } else {
            session()->setFlashdata('gagal', 'username atau password salah');
            return redirect()->to(base_url('Admin/login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Admin/login'));
    }
}
