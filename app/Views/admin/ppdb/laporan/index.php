<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Laporan</legend>
<article>
    <div class="flex">
        <div class="kotak">
            <a href="<?= base_url(); ?>/admin/laporan/pembayaran" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                <i class="fas fa-file"></i>
                <p>Calon Santri</p>
            </a>
        </div>
    </div>

</article>
<?= $this->endSection(); ?>