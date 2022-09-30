<?php

namespace App\Controllers\PPDB;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PendaftaranModel;
use App\Models\SantriModel;
use TCPDF;

class Santri extends BaseController
{
    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->pembayaranModel  = new PembayaranModel();
    }
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'anda belum login sayang !!!');
            return redirect()->to(base_url('PPDB/login'));
        }
        $data = [
            'judul' => 'Santri'
        ];
        return view('PPDB/konten/index', $data);
    }

    public function formulir($id_pengguna)
    {
        $data = [
            'judul' => 'formulir',
            'validasi' => \Config\Services::validation(),
            'formulir' => $this->pendaftaranModel->getFormulir($id_pengguna)
        ];
        return view('PPDB/konten/formulir', $data);
    }

    public function cetak_formulir($id_pengguna)
    {
        $data = [
            'judul' => 'formulir',
            'validasi' => \Config\Services::validation(),
            'formulir' => $this->pendaftaranModel->getFormulir($id_pengguna)
        ];
        return view('PPDB/konten/cetak_formulir', $data);
        // create new PDF document
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Ahmad Faqih Arifin');
        // $pdf->SetTitle('Formulir');
        // $pdf->SetSubject('Cetak Formulir');

        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // set image scale factor
        // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // $pdf->AddPage();

        // $pdf->writeHTML($html, true, false, true, false, '');
        // set JPEG quality
        // $pdf->setJPEGQuality(75);
        // $pdf->Image('/assets/gambar/atribut/kop surat.jpg', 10, 10, 189);
        // $this->response->setContentType('application/pdf');
        // $pdf->Output('tes', 'I');
    }

    public function simpan($id_daftar)
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
            return redirect()->to('/PPDB/santri/formulir/' . $this->request->getVar('id_pengguna'))->withInput();
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
        return redirect()->to('PPDB/santri');
    }

    public function pembayaran($id_pengguna)
    {
        session();
        $data = [
            'judul' => 'pembayaran',
            'validasi' => \Config\Services::validation(),
            'pembayaran' => $this->pembayaranModel->getPembayaran($id_pengguna)
        ];
        return view('PPDB/konten/pembayaran', $data);
    }

    public function simpan_pembayaran($id_pembayaran)
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
            $validasi = \Config\Services::validation();
            return redirect()->to('/PPDB/santri/pembayaran/' . $this->request->getVar('id_pengguna'))->withInput()->with('validasi', $validasi);
        }
        $fileGambar = $this->request->getFile('gambar');
        // apakah tetap gambar lama 
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarlama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('assets/gambar/bukti', $namaGambar);
            // hapus gambar lama
            // unlink('assets/gambar/photo/' . $this->request->getVar('gambarlama'));
        }
        $this->pembayaranModel->save([
            'id_pembayaran' => $id_pembayaran,
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama' => $this->request->getVar('nama'),
            'bukti' => $namaGambar,
            'status' => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('pesan', 'bukti sudah di kirim');
        return redirect()->to('PPDB/santri/pembayaran/' . session()->get('id_pengguna'));
    }
    public function cetak_pembayaran($id_pengguna)
    {
        $data = [
            'judul' => 'Cetak pembayaran',
            'validasi' => \Config\Services::validation(),
            'pembayaran' => $this->pembayaranModel->getPembayaran($id_pengguna)
        ];
        return view('PPDB/konten/cetak_pembayaran', $data);
    }

    public function pengaturan($id_pengguna)
    {
        $data = [
            'judul' => 'pengaturan',
            'validasi' => \Config\Services::validation(),
            'pengaturan' => $this->santriModel->getAkun($id_pengguna)
        ];
        return view('PPDB/konten/pengaturan', $data);
    }

    public function simpan_pengaturan($id_register)
    {
        $this->santriModel = new SantriModel();
        $this->santriModel->save([
            'id_register' => $id_register,
            'password' => $this->request->getVar('password'),
        ]);
        session()->setFlashdata('pesan', 'password berhasil diubah');
        return redirect()->to('PPDB/santri/pengaturan/' . session()->get('id_pengguna'));
    }
}
