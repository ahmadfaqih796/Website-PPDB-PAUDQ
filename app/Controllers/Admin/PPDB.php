<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\SantriModel;

class PPDB extends BaseController
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
            'judul' => 'Admin',
            'total_berita' => $berita->countAllResults(),
            'lunas' => $lunas->countAllResults(),
            'b_lunas' => $b_lunas->countAllResults(),
            'c_santri' => $c_santri->countAllResults()
        ];
        return view('Admin/ppdb/index', $data);
    }

    public function santri()
    {
        $this->santriModel = new SantriModel();
        // pencarian
        $kunci = $this->request->getVar('kunci');
        if ($kunci) {
            $santri = $this->santriModel->cari($kunci);
        } else {
            $santri = $this->santriModel;
        }
        $halaman = $this->request->getVar('page_santri') ? $this->request->getVar('page_santri') : 1;
        $data = [
            'judul' => 'santri',
            'santri' => $santri->paginate(5, 'santri'),
            "pager" => $this->santriModel->pager,
            "halaman" => $halaman
        ];
        return view('admin/ppdb/santri/index', $data);
    }
    public function cetak_formulir($id_pengguna)
    {
        $data = [
            'judul' => 'Cetak formulir',
            'validasi' => \Config\Services::validation(),
            'formulir' => $this->pendaftaranModel->getFormulir($id_pengguna)
        ];
        return view('admin/ppdb/santri/cetak', $data);
    }
    public function ubah_santri($id_pengguna)
    {
        $data = [
            'judul' => 'Ubah Akun',
            'validasi' => \Config\Services::validation(),
            'formulir' => $this->pendaftaranModel->getFormulir($id_pengguna)
        ];
        return view('admin/ppdb/santri/ubah', $data);
    }
    public function perbarui_santri($id_daftar)
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Admin/PPDB/ubah_santri/' . $this->request->getVar('id_pengguna'))->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        // apakah tetap gambar lama 
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarlama');
            // $namaGambar = 'g-kosong.jpg';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('assets/gambar/photo', $namaGambar);
            // hapus gambar lama
            // unlink('assets/gambar/photo/' . $this->request->getVar('gambarlama'));
        }
        $this->pendaftaranModel->save([
            'id_daftar' => $id_daftar,
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama' => $this->request->getVar('nama'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jk' => $this->request->getVar('jk'),
            'nik' => $this->request->getVar('nik'),
            'kk' => $this->request->getVar('kk'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'jml_saudara' => $this->request->getVar('jml_saudara'),
            'cita' => $this->request->getVar('cita'),
            'hobi' => $this->request->getVar('hobi'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'gambar' => $namaGambar
        ]);
        $this->pembayaranModel->save([
            'id_pembayaran' => $id_daftar,
            'nama' => $this->request->getVar('nama')
        ]);
        $this->santriModel->save([
            'id_register' => $id_daftar,
            'nama' => $this->request->getVar('nama')
        ]);
        session()->setFlashdata('pesan', 'data berhasil di simpan');
        return redirect()->to('Admin/PPDB/santri');
    }
    public function hapus($id_pengguna)
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->santriModel = new SantriModel();
        $this->pendaftaranModel->delete($id_pengguna);
        $this->santriModel->delete($id_pengguna);
        $this->pembayaranModel->delete($id_pengguna);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('admin/ppdb/santri');
    }

    public function pembayaran()
    {
        $this->pembayaranModel = new PembayaranModel();
        // pencarian
        $kunci = $this->request->getVar('kunci');
        if ($kunci) {
            $pembayaran = $this->pembayaranModel->cari($kunci);
        } else {
            $pembayaran = $this->pembayaranModel;
        }
        $halaman = $this->request->getVar('page_pembayaran') ? $this->request->getVar('page_pembayaran') : 1;
        $data = [
            'judul' => 'pembayaran',
            'pembayaran' => $pembayaran->paginate(5, 'pembayaran'),
            "pager" => $this->pembayaranModel->pager,
            "halaman" => $halaman
        ];
        return view('admin/ppdb/pembayaran/index', $data);
    }
    public function status($id_pembayaran)
    {
        $data = [
            'judul' => 'Ubah Status',
            'validasi' => \Config\Services::validation(),
            'pembayaran' => $this->pembayaranModel->getPembayaran($id_pembayaran)
        ];
        return view('admin/ppdb/pembayaran/status', $data);
    }
    public function ubah_status($id_pembayaran)
    {
        $this->pembayaranModel->save([
            'id_pembayaran' => $id_pembayaran,
            'nama' => $this->request->getVar('nama'),
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'bukti' => $this->request->getVar('bukti'),
            'status' => $this->request->getVar('status'),
            'tanggal' => $this->request->getVar('tanggal'),
            'admin' => $this->request->getVar('admin'),
        ]);
        session()->setFlashdata('pesan', 'status berhasil diubah.');
        return redirect()->to('admin/ppdb/pembayaran');
    }
    public function cetak_pembayaran($id_pengguna)
    {
        $data = [
            'judul' => 'Cetak pembayaran',
            'validasi' => \Config\Services::validation(),
            'pembayaran' => $this->pembayaranModel->getPembayaran($id_pengguna)
        ];
        return view('admin/ppdb/pembayaran/cetak', $data);
    }
}
