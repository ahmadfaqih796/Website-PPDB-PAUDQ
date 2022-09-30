<?= $this->extend('layout/santri'); ?>
<?= $this->section('konten'); ?>
<legend>Pengumuman</legend>
<article>
    <p>hello</p>
    <h1>Selamat Datang <?= session()->get('username'); ?></h1>
    <a href="/PPDB/santri/formulir/<?= session()->get('id_pengguna'); ?>">babang</a>
</article>
<?= $this->endSection(); ?>