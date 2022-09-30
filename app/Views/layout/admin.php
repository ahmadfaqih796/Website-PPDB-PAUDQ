<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="<?= base_url() ?>/assets/gambar/atribut/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/navigasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/konten.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/pembayaran.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/pengaturan.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/form.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/tabel.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/header.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/halaman.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/sidebar.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/footer.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/gambar-slider.css">
    <script src="<?php base_url() ?>/assets/js/fontawesome.js"></script>
    <title><?= $judul; ?></title>

</head>

<body>
    <?php
    if (session()->get('username') == '') {
        session()->setFlashdata('gagal', 'anda belum login sayang !!!');
        return redirect()->to(base_url('Admin/login'));
    }
    if (!empty(session()->getFlashdata('gagal'))) {
    ?>
        <script>
            alert("anda masih dimenu home !!!, jangan pindah ke halaman login itu haram");
        </script>
    <?php
    }
    if (session()->getFlashdata('pesan')) {
    ?>
        <script>
            alert("<?= session()->getFlashdata('pesan'); ?>");
        </script>
    <?php } ?>

    <nav>
        <ul>
            <li><a href="<?php base_url() ?>/admin/ppdb"><i class="fas fa-house-user"></i> Beranda</a></li>
            <li><a href="<?php base_url() ?>/admin/ppdb/santri"><i class="fas fa-id-card"></i> Santri</a></li>
            <li><a href="<?php base_url() ?>/admin/ppdb/pembayaran"><i class="fas fa-money-bill"></i> Pembayaran</a></li>
            <li><a href="<?php base_url() ?>/admin/laporan"><i class="fas fa-file"></i> Laporan</a></li>
            <li><a href="<?php base_url() ?>/admin/berita"><i class="fas fa-newspaper"></i> Berita</a></li>
            <li><a href=" <?php base_url() ?>/admin/login/logout"><i class="fas fa-arrow-left"></i> Logout</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo">
            <h4>Admin Al-Khaira</h4>
        </div>
    </nav>


    <div class="konten">
        <img class="judul" src="<?php base_url() ?>/assets/gambar/atribut/papan-kayu.png" alt="">
        <?= $this->renderSection('konten'); ?>
    </div>


    <script src="<?php base_url() ?>/assets/js/navigasi.js"></script>
    <script type="text/javascript" src="<?php base_url() ?>/assets/js/santri/navigasi.js"></script>
    <script type="text/javascript" src="<?php base_url() ?>/assets/js/ppdb/gambar-slider.js"></script>
    <script src="<?= base_url(); ?>/assets/js/lihat password.js"></script>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }

        function tampilGambar() {
            const gambar = document.querySelector('#gambar');
            const imgTampil = document.querySelector('.tampil-gambar');

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgTampil.src = e.target.result;
            }
        }
    </script>
</body>

</html>