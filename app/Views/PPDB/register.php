<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="icon" href="<?= base_url() ?>/assets/gambar/atribut/icon.ico">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/akun/login.css">
</head>

<body>
    <div id="particles-js"></div>
    <div class="card">
        <legend>Register</legend>
        <form action="register/simpan" method="POST">
            <?= csrf_field() ?>
            <?php
            $id_pel = date("YmdHis");
            if (date('z') < 10) {
                $no_met = "00" . date("zymNHs");
            } elseif (date('z') < 100) {
                $no_met = "0" . date("zymNHs");
            } else {
                $no_met = date("zymNHs");
            }
            ?>
            <input type="hidden" id="id_pengguna" name="id_pengguna" value="<?= $id_pel; ?>">
            <input type="hidden" id="gambar" name="gambar" value="g-kosong.jpg">
            <input type="hidden" id="bukti" name="bukti" value="g-kosong.jpg">
            <img src="<?= base_url(); ?>/assets/gambar/server/santri.png" alt="">
            <div class="input-group">
                <input id="username" type="username" name="username" class="<?= ($validasi->hasError('username')) ? 'tidak-valid' : ''; ?>" autocomplete="off" autofocus />
                <span>Username</span>
                <div class="tidak-valid-feedback"><?= $validasi->getError('username') ?></div>
            </div>
            <div class="input-group">
                <input type="text" name="nama" id="nama" autocomplete="off" required>
                <span>Nama</span>
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
                <input type="submit" value="Daftar">
            </div>
        </form>
    </div>
    <script src="<?= base_url(); ?>/assets/js/lihat password.js"></script>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="<?= base_url(); ?>/assets/js/particles.js"></script>
</body>

</html>