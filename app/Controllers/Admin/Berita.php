<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }
    public function index()
    {
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
        return view('admin/ppdb/berita/index', $data);
    }

    public function tambah()
    {
        // session();
        $data = [
            "judul" => "Tambah berita",
            "validasi" => \Config\Services::validation()
        ];
        return view('admin/ppdb/berita/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[berita.judul]',
                'errors' => [
                    'required' => '{field} berita harus diisi dan tidak boleh kosong',
                    'is_unique' => '{field} berita sudah terdaftar dan tidak boleh sama'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Masukkkan gambar',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validasi = \Config\Services::validation();
            // dd($validasi);
            // return redirect()->to('/admin/berita/tambah')->withInput()->with('validasi', $validasi);
            return redirect()->to('/admin/berita/tambah')->withInput();
        }
        // dd('berhasil');

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // jika gambar tidak ada maka
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'g-kosong.jpg';
        } else {
            // $fileGambar->move('assets/gambar/berita');
            // ambil nama pada gambar
            // $namaGambar = $fileGambar->getName();
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('assets/gambar/berita', $namaGambar);
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        // dd($this->request->getVar());
        $this->beritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'post' => $this->request->getVar('post'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan.');
        return redirect()->to('/admin/berita');
    }

    public function detail($slug)
    {
        $data = [
            "judul" => "detail berita",
            "berita" => $this->beritaModel->getBerita($slug)
        ];
        // jika berita tidak ada maka
        if (empty($data['berita'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul berita ' . $slug . ' tidak ditemukan');
        }
        return view('admin/ppdb/berita/detail', $data);
    }

    public function hapus($id)
    {
        // cari gambar berdasarkan id
        $berita = $this->beritaModel->find($id);
        // cek gambar bukan default 
        if ($berita['gambar'] != 'g-kosong.jpg') {
            // hapus gambar
            unlink('assets/gambar/berita/' . $berita['gambar']);
        }
        $this->beritaModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('admin/berita');
    }

    public function ubah($slug)
    {
        $data = [
            'judul' => "Ubah berita",
            'validasi' => \Config\Services::validation(),
            'berita' => $this->beritaModel->getBerita($slug)
        ];
        return view('admin/ppdb/berita/ubah', $data);
    }

    public function perbarui($id)
    {
        // cek judul
        $beritaLama = $this->beritaModel->getBerita($this->request->getVar('slug'));
        if ($beritaLama['judul'] == $this->request->getVar('judul')) {
            $aturan_judul = 'required';
        } else {
            $aturan_judul = 'required|is_unique[berita.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $aturan_judul,
                'errors' => [
                    'required' => '{field} berita harus diisi dan tidak boleh kosong',
                    'is_unique' => '{field} berita sudah terdaftar dan tidak boleh sama'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/berita/ubah/' . $this->request->getVar('slug'))->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        // apakah tetap gambar lama 
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarlama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('assets/gambar/berita', $namaGambar);
            // hapus gambar lama
            unlink('assets/gambar/berita/' . $this->request->getVar('gambarlama'));
        }
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('judul'), '-', true);
        // dd($this->request->getVar());
        $this->beritaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'post' => $this->request->getVar('post'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah.');
        return redirect()->to('/admin/berita');
    }
}
