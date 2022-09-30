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
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/navigasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/konten.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/pembayaran.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/pengaturan.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/form.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/header.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/sidebar.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/footer.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/santri/gambar-slider.css">
    <script src="<?php base_url() ?>/assets/js/fontawesome.js"></script>
    <title><?= $judul; ?></title>

</head>

<body>
    <?php
    if (session()->get('username') == '') {
        session()->setFlashdata('gagal', 'anda belum login sayang !!!');
        return redirect()->to(base_url('PPDB/login'));
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
        <div class="logo">
            <h4>Ahmad Faqih</h4>
        </div>
        <ul>
            <li><a href="<?php base_url() ?>/PPDB/santri">Beranda</a></li>
            <li><a href="<?php base_url() ?>/PPDB/santri/formulir/<?= session()->get('id_pengguna'); ?>">Formulir</a></li>
            <li><a href="<?php base_url() ?>/PPDB/santri/formulir/<?= session()->get('id_pengguna'); ?>">Pas Photo</a></li>
            <li><a href="<?php base_url() ?>/PPDB/santri/pembayaran/<?= session()->get('id_pengguna'); ?>">Pembayaran</a></li>
            <li><a href="<?php base_url() ?>/PPDB/santri/cetak/<?= session()->get('id_pengguna'); ?>">Cetak</a></li>
            <li><a href="<?php base_url() ?>/PPDB/santri/pengumuman">Pengumuman</a></li>
            <li><a href=" <?php base_url() ?>/PPDB/login/logout">Logout</a></li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div style="overflow: auto;">
        <div class="sidebar">
            <img class="judul" src="<?php base_url() ?>/assets/gambar/atribut/kayu-gantung.png" alt="">
            <legend>Menu</legend>
            <div class="menu">
                <div class="menu-item">
                    <img class="menu-gambar" src="<?php base_url() ?>/assets/gambar/atribut/textur-kayu1.png" alt="">
                    <a href="<?php base_url() ?>/PPDB/santri">Beranda</a>
                </div>
                <div class="menu-item">
                    <img class="menu-gambar" src="<?php base_url() ?>/assets/gambar/atribut/textur-kayu1.png" alt="">
                    <a href="<?php base_url() ?>/PPDB/santri/formulir/<?= session()->get('id_pengguna'); ?>">Formulir</a>
                </div>
                <div class="menu-item">
                    <img class="menu-gambar" src="<?php base_url() ?>/assets/gambar/atribut/textur-kayu1.png" alt="">
                    <a href="<?php base_url() ?>/PPDB/santri/pembayaran/<?= session()->get('id_pengguna'); ?>">Pembayaran</a>
                </div>
                <div class="menu-item">
                    <img class="menu-gambar" src="<?php base_url() ?>/assets/gambar/atribut/textur-kayu1.png" alt="">
                    <a href="<?php base_url() ?>/PPDB/santri/pengaturan/<?= session()->get('id_pengguna'); ?>">Pengaturan</a>
                </div>
                <div class="menu-item">
                    <img class="menu-gambar" src="<?php base_url() ?>/assets/gambar/atribut/textur-kayu1.png" alt="">
                    <a href="<?php base_url() ?>/PPDB/login/logout">Logout</a>
                </div>
            </div>
        </div>

        <div class="konten">
            <img class="judul" src="<?php base_url() ?>/assets/gambar/atribut/papan-kayu.png" alt="">
            <?= $this->renderSection('konten'); ?>
        </div>
    </div>


    <script src="<?php base_url() ?>/assets/js/navigasi.js"></script>
    <script type="text/javascript" src="<?php base_url() ?>/assets/js/santri/navigasi.js"></script>
    <script type="text/javascript" src="<?php base_url() ?>/assets/js/santri/gambar-slider.js"></script>
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