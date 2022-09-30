<?= $this->extend('layout/pengunjung'); ?>
<?= $this->section('konten'); ?>
<legend>Detail</legend>
<h2><?= $berita['judul']; ?></h2>
<hr>
<img src="<?= base_url(); ?>/assets/gambar/berita/<?= $berita['gambar']; ?>" alt="" class="logo">
<p><?= $berita['deskripsi']; ?></p>
<?= $this->endSection(); ?>