<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Beranda</legend>
<article>
    <div class="flex">
        <div class="kotak">
            <i class="fas fa-id-card"></i>
            <p>Calon Santri</p>
            <p><?= $c_santri; ?></p>
        </div>
        <div class="kotak">
            <i class="fas fa-money-bill-wave"></i>
            <p>Sudah Bayar</p>
            <p><?= $lunas; ?></p>
        </div>
        <div class="kotak">
            <i class="fas fa-money-bill"></i>
            <p>Belum Bayar</p>
            <p><?= $b_lunas; ?></p>
        </div>
        <div class="kotak">
            <i class="fas fa-newspaper"></i>
            <p>Berita</p>
            <p><?= $total_berita; ?></p>
        </div>
    </div>

</article>
<?= $this->endSection(); ?>