<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\SantriModel;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->santriModel = new SantriModel();
        $this->beritaModel = new BeritaModel();
    }
    public function index()
    {
        $this->beritaModel = new BeritaModel();
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'anda belum login sayang !!!');
            return redirect()->to(base_url('Admin/login'));
        }
        $berita = $this->beritaModel->jml_berita();
        $lunas = $this->pembayaranModel->lunas();
        $b_lunas = $this->pembayaranModel->belum_lunas();
        $c_santri = $this->santriModel->jml_c_santri();
        $data = [
            'judul' => 'Laporan',
            'total_berita' => $berita->countAllResults(),
            'lunas' => $lunas->countAllResults(),
            'b_lunas' => $b_lunas->countAllResults(),
            'c_santri' => $c_santri->countAllResults()
        ];
        return view('Admin/ppdb/laporan/index', $data);
    }
    public function pembayaran()
    {
        $this->pembayaranModel = new PembayaranModel();
        $lunas = $this->pembayaranModel->findAll();
        $data = [
            'judul' => 'Cetak laporan pembayaran',
            'lunas' => $lunas
        ];
        return view('admin/ppdb/laporan/pembayaran', $data);
    }
}
