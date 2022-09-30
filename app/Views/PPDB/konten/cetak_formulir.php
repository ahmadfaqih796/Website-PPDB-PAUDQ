<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <?php echo "<title>Formulir_" . $formulir['nama'] . "</title>" ?>
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/formulir.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/cetak_formulir.css" media="print">
</head>

<body>
    <page>
        <img src="<?php base_url(); ?>/assets/gambar/atribut/kop surat.jpg" alt="" class="kop">
        <h1>FORMULIR</h1>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $formulir['nama']; ?></td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td><?= $formulir['tempat_lahir'] . ', ' . $formulir['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $formulir['jk']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $formulir['nik']; ?></td>
            </tr>
            <tr>
                <td>KK</td>
                <td>:</td>
                <td><?= $formulir['kk']; ?></td>
            </tr>
            <tr>
                <td>Anak ke</td>
                <td>:</td>
                <td><?= $formulir['anak_ke'] . ' dari ' . $formulir['jml_saudara'] . ' bersaudara'; ?></td>
            </tr>
            <tr>
                <td>Cita-cita</td>
                <td>:</td>
                <td><?= $formulir['cita']; ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td><?= $formulir['hobi']; ?></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td><?= $formulir['nama_ayah']; ?></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td><?= $formulir['nama_ibu']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $formulir['alamat']; ?></td>
            </tr>
            <tr>
                <td>No. Hp</td>
                <td>:</td>
                <td><?= $formulir['no_hp']; ?></td>
            </tr>
        </table>
        <div class="teks">
            ..........,...................
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            (____________________)
        </div>

    </page>
    <div class="pesan">
        <h2>Gunakan Web Browser Firefox atau Chrome, ukuran kertas A4 dengan orientasi Portrait untuk cetak atau juga
            bisa simpan dengan format PDF dan jika tombol cetak tidak muncul di menu print maka refresh browser kembali</h2>
        <a href="javascript:window.print();">Cetak</a>
    </div>
</body>

</html>