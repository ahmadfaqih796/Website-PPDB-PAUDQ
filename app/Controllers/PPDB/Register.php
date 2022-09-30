<?php

namespace App\Controllers\PPDB;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\SantriModel;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'daftar akun',
            'validasi' => \Config\Services::validation()
        ];
        return view('PPDB/register', $data);
    }
    public function simpan()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[c_santri.username]',
                'errors' => [
                    'required' => '{field} harus diisi dan tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar dan tidak boleh sama'
                ]
            ]
        ])) {
            return redirect()->to('/PPDB/Register')->withInput();
        }
        $this->santriModel = new SantriModel();
        $this->daftarModel = new PendaftaranModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->santriModel->save([
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'nama' => $this->request->getVar('nama')

        ]);
        $this->daftarModel->save([
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama' => $this->request->getVar('nama'),
            'gambar' => $this->request->getVar('gambar')
        ]);
        $this->pembayaranModel->save([
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama' => $this->request->getVar('nama'),
            'bukti' => $this->request->getVar('bukti')
        ]);
        session()->setFlashdata('pesan', 'berhasil daftar');
        return redirect()->to('PPDB/login');
    }
}
