<?= $this->extend('layout/pengunjung'); ?>
<?= $this->section('konten'); ?>
<legend>Berita</legend>
<div class="pencarian">
    <form action="" method="POST">
        <input type="text" name="kunci" placeholder="cari berita">
        <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<article>
    <?php
    $i = 1 + (5 * ($halaman - 1));
    foreach ($berita as $p) : ?>
        <br>
        <a href="/berita/detail/<?= $p['slug']; ?>" class="link">
            <h1><?= $p['judul']; ?></h1>
        </a>
        <div class="flex">
            <img src="<?= base_url(); ?>/assets/gambar/berita/<?= $p['gambar']; ?>" alt="">
            <div class="panjang-text">
                <?= $p['deskripsi']; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $pager->links('berita', 'halaman') ?>
</article>
<?= $this->endSection(); ?>