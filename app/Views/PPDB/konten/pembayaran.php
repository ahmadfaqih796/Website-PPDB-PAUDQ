<?= $this->extend('layout/santri'); ?>
<?= $this->section('konten'); ?>
<legend>Pembayaran</legend>
<article>
    <p>Setelah mengisi data formulir sudah lengkap, segera melakukan pembayaran dengan transfer Rp. 50.000 ke rekening
        di bawah ini atau datang langsung ke PAUDQ Al-Khaira Mahabbatul Uluum kemudian upload bukti pembayaran dibawah
        ini dengan cara mengphoto atau screenshoot bukti pembayaran dan untuk transfernya bisa kirim ke rekening berikut
        ini :</p>
    <ol>
        <li>
            <p><img src="<?= base_url(); ?>/assets/gambar/atribut/Bank_Central_Asia.png" alt="" style="width: 70px; display: inline;"> : 6019005242621436 (Ahmad Faqih Arifin)</p>
        </li>
    </ol>
    <p>Silahkan upload di bawah ini :</p>
    <div class="pembayaran">
        <form action="/PPDB/santri/simpan_pembayaran/<?= $pembayaran['id_pembayaran']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <h2>Upload Bukti</h2>
            <input type="hidden" name="id_pengguna" value="<?= $pembayaran['id_pengguna']; ?>">
            <input type="hidden" name="gambarlama" value="<?= $pembayaran['bukti']; ?>">
            <input type="hidden" name="nama" value="<?= $pembayaran['nama']; ?>">
            <input type="hidden" name="status" value="<?= $pembayaran['status']; ?>">
            <input type="file" id="gambar" name="gambar" class=" <?= ($validasi->hasError('gambar')) ? 'tidak-valid-feedback' : ''; ?>" onchange="tampilGambar()">
            <div class="tidak-valid-feedback"><?= $validasi->getError('gambar') ?>file berupa gambar dan ukuran maksimal 1 mb</div>
            <img src="/assets/gambar/bukti/<?= $pembayaran['bukti']; ?>" class="tampil-gambar">
            <br>
            <input type="submit" value="simpan">
        </form>
    </div>
    <p>
        Segera hubungi panitia
        <a href="https://wa.me/6282182771538" target="_blank" rel="noopener noreferrer"><b>Ahmad Faqih Arifin</b></a>
        apabilas sudah mengupload bukti pembayarannya maka tunggu hingga panitia merespon bukti tersebut hingga status
        pembayarannya akan berwarna hijau dan juga bisa mencetak
        bukti tersebut, apabila belum membayar maka statusnya akan bewarna merah dan tidak bisa mencetak. Status saat
        ini adalah :
    </p>
    <?php if (!$pembayaran['status'] == 1) { ?>
        <div class="tombol">
            <a href="/PPDB/santri/pembayaran" style="background-color: red;"><i class="fas fa-money-bill"></i></a>
        </div>
    <?php } else { ?>
        <div class="tombol">
            <a href="/PPDB/santri/cetak_pembayaran/<?= $pembayaran['id_pengguna'] ?>"><i class="fas fa-money-bill"></i></a>
        </div>
    <?php
    } ?>
    <p></p>
    <?php
    // $status = $penggunaan['status'];
    // if (!$status == 1) {
    //     $status = 'belum bayar';
    // } else {
    //     $status = 'sudah bayar';
    // } 
    ?>
</article>
<?= $this->endSection(); ?>