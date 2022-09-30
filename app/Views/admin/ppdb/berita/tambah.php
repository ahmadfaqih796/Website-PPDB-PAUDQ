<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Tambah Berita</legend>
<article>
    <div class="isi-form">
        <form action="/admin/berita/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="baris">
                <div class="kolom-15">
                    <label for="judul">Judul</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="judul" name="judul" class="<?= ($validasi->hasError('judul')) ? 'tidak-valid' : ''; ?>" placeholder="judulnya ?" autofocus value="<?= old('judul') ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('judul') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="deskripsi">Isi</label>
                </div>
                <div class="kolom-75">
                    <textarea type="text" id="deskripsi" name="deskripsi" placeholder="Isinya ?" style="height:100px"><?= old('deskripsi') ?></textarea>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="post">Penulis</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="post" name="post" placeholder="siapa penulisnya ?" value="<?= old('post') ?>">
                </div>
            </div>
            <!-- <div class="baris">
                <div class="kolom-15">
                    <label for="country">Country</label>
                </div>
                <div class="kolom-75">
                    <select id="country" name="country">
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>
                </div>
            </div> -->
            <div class="baris">
                <div class="kolom-15">
                    <label for="gambar">Gambar</label>
                </div>
                <div class="kolom-75">
                    <input type="file" id="gambar" name="gambar" class=" <?= ($validasi->hasError('gambar')) ? 'tidak-valid' : ''; ?>" onchange="tampilGambar()">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('gambar') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15"></div>
                <div class="kolom-75">
                    <img src="/assets/gambar/photo/g-kosong.jpg" class="tampil-gambar">
                </div>
            </div>
            <div class="baris">
                <input type="submit" value="Kirim">
            </div>
        </form>
    </div>
</article>
<?= $this->endSection() ?>