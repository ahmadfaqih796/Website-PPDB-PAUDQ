<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/navigasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/konten.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/pembayaran.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/pengunjung/pengaturan.css">
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
            <legend><?= $nama; ?></legend>
            <?= $this->renderSection('konten'); ?>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="<?php base_url() ?>/assets/gambar/sarana prasarana/Murid bermain Ayunan.jpeg">
                    <div class="text">Santri bermain Ayunan</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="<?php base_url() ?>/assets/gambar/sarana prasarana/Murid sedang belajar.jpeg">
                    <div class="text">Santri sedang belajar</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="<?php base_url() ?>/assets/gambar/sarana prasarana/Ruang Permainan Anak PAUDQU 2,5 M x 6 M.jpeg">
                    <div class="text">Ruang Permainan Anak PAUDQ</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <br>
            <h2>Visi</h2>
            <hr>
            <p style="text-align:center">Membentuk generasi Qur’ani, berakhlak mulia, cerdas, kreatif dan mandiri.</p>
            <br>
            <h2>Misi</h2>
            <hr>
            <p style="text-align:center">Mendidik pribadi yang berkarakter, berakhlak mulia dan memiliki kecintaan terhadap Al Qur’an sejak usia dini. </p>
            <p style="text-align:center">Mengajarkan kemampuan membaca Al Qur’an sejak usia dini.</p>
            <br>
            <h2>Lokasi</h2>
            <hr>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7931.917643518082!2d106.9963243!3d-6.2691460999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dbdb22faa5b%3A0x774e0c1ef06ee1c1!2sMahabbatul%20Uluum!5e0!3m2!1sid!2sid!4v1624612283120!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <footer>
        <h3>Kontak</h3>
        <div class="media">
            <a href="https://wa.me/6282182771538"><img src="<?= base_url() ?>/assets/gambar/sosial media/whatsapp.gif" alt="Whatsapp"></a>
            <a href="https://www.instagram.com/himatk_ubsi/"><img src="<?= base_url() ?>/assets/gambar/sosial media/instagram.gif" alt="Instagram"></a>
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