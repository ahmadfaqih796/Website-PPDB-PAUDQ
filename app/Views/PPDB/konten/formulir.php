<?= $this->extend('layout/santri'); ?>
<?= $this->section('konten'); ?>
<legend>Formulir</legend>
<article>
    <div class="isi-form">
        <form action="/PPDB/santri/simpan/<?= $formulir['id_daftar']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id_pengguna" value="<?= $formulir['id_pengguna']; ?>">
            <input type="hidden" name="gambarlama" value="<?= $formulir['gambar']; ?>">
            <div class="baris">
                <div class="kolom-15">
                    <label for="nama">Nama</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama" name="nama" class="<?= ($validasi->hasError('nama')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan nama" autofocus value="<?= (old('nama')) ? old('nama') : $formulir['nama'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nama') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="tempat_lahir">Tempat Lahir</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="<?= ($validasi->hasError('tempat_lahir')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan tempat_lahir" autofocus value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $formulir['tempat_lahir'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('tempat_lahir') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                </div>
                <div class="kolom-75">
                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="<?= ($validasi->hasError('tgl_lahir')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan tgl_lahir" autofocus value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : $formulir['tgl_lahir'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('tgl_lahir') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="jk">Jenis Kelamin</label>
                </div>
                <div class="kolom-75">
                    <select name="jk" id="jk">
                        <option value="<?= (old('jk')) ? old('jk') : $formulir['jk'] ?>"><?= (old('jk')) ? old('jk') : $formulir['jk'] ?></option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                    <div class="tidak-valid-feedback"><?= $validasi->getError('jk') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="kk">Kartu Keluarga</label>
                </div>
                <div class="kolom-75">
                    <input type="number" id="kk" name="kk" class="<?= ($validasi->hasError('kk')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan kk" autofocus value="<?= (old('kk')) ? old('kk') : $formulir['kk'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('kk') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="nik">NIK</label>
                </div>
                <div class="kolom-75">
                    <input type="number" id="nik" name="nik" class="<?= ($validasi->hasError('nik')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan nomor niknya" autofocus value="<?= (old('nik')) ? old('nik') : $formulir['nik'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nik') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="anak_ke">Anak ke</label>
                </div>
                <div class="kolom-75">
                    <input type="number" id="anak_ke" name="anak_ke" class="<?= ($validasi->hasError('anak_ke')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan anak_ke" autofocus value="<?= (old('anak_ke')) ? old('anak_ke') : $formulir['anak_ke'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('anak_ke') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="jml_saudara">Jumlah Saudara</label>
                </div>
                <div class="kolom-75">
                    <input type="number" id="jml_saudara" name="jml_saudara" class="<?= ($validasi->hasError('jml_saudara')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan jml_saudara" autofocus value="<?= (old('jml_saudara')) ? old('jml_saudara') : $formulir['jml_saudara'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('jml_saudara') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="cita">Cita - cita</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="cita" name="cita" class="<?= ($validasi->hasError('cita')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan cita" autofocus value="<?= (old('cita')) ? old('cita') : $formulir['cita'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('cita') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="hobi">Hobi</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="hobi" name="hobi" class="<?= ($validasi->hasError('hobi')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan hobi" autofocus value="<?= (old('hobi')) ? old('hobi') : $formulir['hobi'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('hobi') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="nama_ayah">Nama Ayah</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama_ayah" name="nama_ayah" class="<?= ($validasi->hasError('nama_ayah')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan nama_ayah" autofocus value="<?= (old('nama_ayah')) ? old('nama_ayah') : $formulir['nama_ayah'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nama_ayah') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="nama_ibu">Nama Ibu</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama_ibu" name="nama_ibu" class="<?= ($validasi->hasError('nama_ibu')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan nama_ibu" autofocus value="<?= (old('nama_ibu')) ? old('nama_ibu') : $formulir['nama_ibu'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nama_ibu') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="alamat">Alamat</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="alamat" name="alamat" class="<?= ($validasi->hasError('alamat')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $formulir['alamat'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('alamat') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="no_hp">No. HP</label>
                </div>
                <div class="kolom-75">
                    <input type="number" id="no_hp" name="no_hp" class="<?= ($validasi->hasError('no_hp')) ? 'tidak-valid' : ''; ?>" placeholder="masukkan no_hp" autofocus value="<?= (old('no_hp')) ? old('no_hp') : $formulir['no_hp'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('no_hp') ?></div>
                </div>
            </div>
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
                    <img src="/assets/gambar/photo/<?= $formulir['gambar']; ?>" class="tampil-gambar">
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15"></div>
                <div class="kolom-75">
                    <label for="gambar"><?= $formulir['gambar']; ?></label>
                </div>
            </div>
            <div style="display: flex;">
                <div class="baris">
                    <a href="/PPDB/santri/cetak_formulir/<?= $formulir['id_pengguna']; ?>" target="_blank">Cetak</a>
                </div>
                <div class="baris">
                    <input type="submit" value="simpan">
                </div>
            </div>
        </form>
    </div>
</article>
<?= $this->endSection(); ?>