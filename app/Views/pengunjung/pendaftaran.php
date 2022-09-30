<?= $this->extend('layout/pengunjung'); ?>
<?= $this->section('konten'); ?>
<legend>Pendaftaran</legend>
<p>PAUDQ Al-Khaira Mahabbatul Uluum membuka pendaftaran Penerimaan Peserta Didik Baru secara offline maupun online dengan cara datang langsung ke tempatnya untuk mengambil dan mengisi formulir atau bisa secara online</p>
<h2>Biaya Pendaftaran</h2>
<hr>
<table>
    <tr>
        <th colspan="2">Biaya PPDB</th>
    </tr>
    <tr>
        <td>Formulir Pendaftaran</td>
        <td>Rp. 50.000</td>
    </tr>
    <tr>
        <td>Uang Gedung</td>
        <td>Rp. 100.000</td>
    </tr>
    <tr>
        <td>Seragam (3 stel)</td>
        <td>Rp. 410.000</td>
    </tr>
    <tr>
        <td>Buku Paket</td>
        <td>Rp. 238.000</td>
    </tr>
    <tr>
        <td>SPP Juli</td>
        <td>Rp. 90.000</td>
    </tr>
    <tr>
        <th>Total</th>
        <th>Rp. 888.000</th>
    </tr>
</table>
<br>
<h2>Syarat Pendaftaran</h2>
<hr>
<ol>
    <li>
        <p>Membayar biaya pendaftaran</p>
    </li>
    <li>
        <p>Mengisi formulir pendaftaran</p>
    </li>
    <li>
        <p>Menyerahkan fotocopy akte kelahiran</p>
    </li>
    <li>
        <p>Menyerahkan fotocopy kartu keluarga</p>
    </li>
    <li>
        <p>Menyerahkan fotocopy KTP orang tua (Ayah & Ibu)</p>
    </li>
    <li>
        <p>Pas foto ukuran 3x4 ( 2 lembar )</p>
    </li>
</ol>
<br>
<h2>Daftar Online</h2>
<hr>
<a href="<?= base_url(); ?>/ppdb/login" class="tombol">Daftar</a>
<?= $this->endSection(); ?>