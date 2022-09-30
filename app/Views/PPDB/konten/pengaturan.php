<?= $this->extend('layout/santri'); ?>
<?= $this->section('konten'); ?>
<legend>Pengaturan</legend>
<article>
    <p>Silahkan untuk mengubah kata sandinya disini agar keamanan akun menjadi aman dan jangan lupa untuk mencatat akun agar tidak lupa, terima kasih ^_^</p>
    <div class="pengaturan">
        <form action="/PPDB/santri/simpan_pengaturan/<?= $pengaturan['id_register']; ?>" method="POST">
            <h2>Username</h2>
            <input type="text" disabled name="username" value="<?= $pengaturan['username']; ?>">
            <h2>Password</h2>
            <input id="password" type="password" name="password" value="<?= $pengaturan['password']; ?>">
            <br>
            <div class="input-checkbox">
                <input type="checkbox" onclick="tampil_Password()">
                <span>Tampilkan Password</span>
            </div>
            <input type="submit" value="simpan">
        </form>
    </div>
</article>
<?= $this->endSection(); ?>