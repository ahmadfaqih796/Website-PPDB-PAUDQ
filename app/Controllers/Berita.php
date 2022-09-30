<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        $this->beritaModel = new BeritaModel();
        // pencarian
        $kunci = $this->request->getVar('kunci');
        if ($kunci) {
            $berita = $this->beritaModel->cari($kunci)->orderBy('id', 'DESC');
        } else {
            $berita = $this->beritaModel->orderBy('id', 'DESC');
        }
        $halaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;
        $data = [
            'judul' => 'berita',
            'berita' => $berita->paginate(5, 'berita'),
            "pager" => $this->beritaModel->pager,
            "halaman" => $halaman
        ];
        return view('pengunjung/berita', $data);
    }

    public function detail($slug)
    {
        $this->beritaModel = new BeritaModel();
        $data = [
            "judul" => "detail berita",
            "berita" => $this->beritaModel->getBerita($slug)
        ];
        // jika berita tidak ada maka
        if (empty($data['berita'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' . $slug . ' tidak ditemukan');
        }
        return view('pengunjung/detail', $data);
    }
}
