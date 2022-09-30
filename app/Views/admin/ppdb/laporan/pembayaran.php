<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <?php echo "<title>" . $judul . "</title>" ?>
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/pembayaran.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/cetak/cetak_laporan_pembayaran.css" media="print">
</head>

<body>
    <page>
        <img src="<?php base_url(); ?>/assets/gambar/atribut/kop surat.jpg" alt="" class="kop">
        <h1>LAPORAN CALON SANTRI</h1>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
            </tr>
            <?php
            $i = 1;
            foreach ($lunas as $p) :
                $status = $p['status'];
                if (!$status == 1) {
                    $status = 'Belum Bayar';
                } else {
                    $status = 'Sudah Bayar';
                } ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $status; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </page>
    <div class="pesan">
        <h2>Gunakan Web Browser Firefox atau Chrome, ukuran kertas A4 dengan orientasi Portrait untuk cetak atau juga
            bisa simpan dengan format PDF dan jika tombol cetak tidak muncul di menu print maka refresh browser kembali</h2>
        <a href="javascript:window.print();">Cetak</a>
    </div>
</body>

</html>