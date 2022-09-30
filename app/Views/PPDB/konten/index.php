<?= $this->extend('layout/santri'); ?>
<?= $this->section('konten'); ?>
<legend>Beranda</legend>
<article>
    <h1>Selamat datang <?= session()->get('nama'); ?>, semoga harimu menyenangkan</h1>
</article>
<?= $this->endSection(); ?>