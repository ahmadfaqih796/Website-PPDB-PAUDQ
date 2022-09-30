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
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/navigasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/konten.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/halaman.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/form.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/header.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/sidebar.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/footer.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/gambar-slider.css">
    <script src="<?php base_url() ?>/assets/js/fontawesome.js"></script>
    <title><?= $judul; ?></title>

</head>

<body>
    <div class="header">
        <img src="<?php base_url() ?>/assets/gambar/atribut/header paudqu.jpg" alt="gambar">
    </div>

    <nav>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo">
            <h4>PAUDQ Al-Khaira</h4>
        </div>
        <ul>
            <li><a href="<?php base_url() ?>/beranda">Beranda</a></li>
            <li><a href="<?php base_url() ?>/pendaftaran">Pendaftaran</a></li>
            <li><a href="<?php base_url() ?>/berita">Berita</a></li>
            <li><a href="<?php base_url() ?>/profil">Profil</a></li>
        </ul>
    </nav>

    <div style="overflow: auto;">
        <div class="konten">
            <img class="judul" src="<?php base_url() ?>/assets/gambar/atribut/papan-kayu.png" alt="">
            <?= $this->renderSection('konten'); ?>
        </div>
    </div>

    <footer>
        <h3>Sosial Media</h3>
        <div class="media">
            <a href="https://wa.me/6282182771538"><img src="<?= base_url() ?>/assets/gambar/sosial media/whatsapp.gif" alt="Whatsapp"></a>
            <a href="#"><img src="<?= base_url() ?>/assets/gambar/sosial media/instagram.gif" alt="Instagram"></a>
            <a href="#"><img src="<?= base_url() ?>/assets/gambar/sosial media/you tube.gif" alt="You Tube"></a>
            <a href="#"><img src="<?= base_url() ?>/assets/gambar/sosial media/facebook.gif" alt="Facebook"></a>
        </div>
    </footer>

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