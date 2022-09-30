<?php

namespace App\Controllers\PPDB;

use App\Controllers\BaseController;
use App\Models\SantriModel;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->santriModel = new SantriModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login'
        ];
        if (session()->get('username')) {
            session()->setFlashdata('gagal', 'Anda masih login, harap logout terlebih dahulu');
            return redirect()->to(base_url('PPDB/Santri'));
        }
        return view('PPDB/login', $data);
    }
    public function cek_login()
    {
        $this->santriModel = new SantriModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->santriModel->cek_login($username, $password);
        if ($cek) {
            session()->set('id_pengguna', $cek['id_pengguna']);
            session()->set('username', $cek['username']);
            session()->set('id_pengguna', $cek['id_pengguna']);
            session()->set('nama', $cek['nama']);
            return redirect()->to(base_url('PPDB/Santri/formulir/' . session()->get('id_pengguna')));
        } else {
            session()->setFlashdata('gagal', 'username atau password salah');
            return redirect()->to(base_url('PPDB/login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('PPDB/login'));
    }
}
