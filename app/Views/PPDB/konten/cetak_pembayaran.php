<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <?php echo "<title>Bukti_Pembayaran_" . $pembayaran['nama'] . "</title>" ?>
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/pembayaran.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/cetak_pembayaran.css" media="print">
</head>

<body>
    <?php
    $status = $pembayaran['status'];
    if (!$status == 1) {
        $status = 'Belum Bayar';
    } else {
        $status = 'Sudah Bayar';
    }
    ?>
    <page>
        <img src="<?php base_url(); ?>/assets/gambar/atribut/kop surat.jpg" alt="" class="kop">
        <h1>BUKTI PEMBAYARAN</h1>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $pembayaran['nama']; ?></td>
            </tr>
            <tr>
                <td>Kode Unik</td>
                <td>:</td>
                <td><?= $pembayaran['id_pembayaran']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $status; ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>Rp. 50.000</td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td>:</td>
                <td>LIMA PULUH RIBU RUPIAH</td>
            </tr>
            <tr>
                <td>Untuk Pembayaran</td>
                <td>:</td>
                <td>Pembayaran Penerimaan Peserta Didik Baru di PAUDQ Al-Khaira Mahabbatul Uluum</td>
            </tr>
        </table>
        <div class="teks">
            Bekasi , <?= $pembayaran['tanggal']; ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            ( <?= $pembayaran['admin']; ?> )
        </div>

    </page>
    <div class="pesan">
        <h2>Gunakan Web Browser Firefox atau Chrome, ukuran kertas A4 dengan orientasi Portrait untuk cetak atau juga
            bisa simpan dengan format PDF dan jika tombol cetak tidak muncul di menu print maka refresh browser kembali</h2>
        <a href="javascript:window.print();">Cetak</a>
    </div>
</body>

</html>