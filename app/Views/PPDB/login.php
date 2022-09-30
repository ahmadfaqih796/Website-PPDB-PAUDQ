<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/assets/gambar/atribut/icon.ico">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/akun/login.css">
    <title><?= $judul; ?></title>
</head>

<body>
    <!-- particles.js container -->
    <div id="particles-js"></div>
    <div class="card">
        <!-- cek pesan notifikasi -->
        <?php
        if (!empty(session()->getFlashdata('gagal'))) {
            echo session()->getFlashdata('gagal');
        }
        if (session()->getFlashdata('pesan')) {
        ?>
            <div class="alert sukses">
                <span class="closebtn">&times;</span>
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php } ?>
        <form action="login/cek_login" method="POST">
            <img src="<?= base_url(); ?>/assets/gambar/atribut/logo PAUDQU.jpg" alt="">
            <div class="input-group">
                <input id="username" type="username" name="username" autocomplete="off" required autofocus />
                <span>Username</span>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" autocomplete="off" required>
                <span>Password</span>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" onclick="tampil_Password()">
                <span>Tampilkan Password</span>
            </div>
            <div class="input-group">
                <input type="submit" value="Login">
            </div>
            <div class="input-group">
                <a href="<?= base_url(); ?>/PPDB/register">Daftar</a>
            </div>
        </form>

    </div>
    <script src="<?= base_url(); ?>/assets/js/lihat password.js"></script>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="<?= base_url(); ?>/assets/js/particles.js"></script>
</body>

</html>