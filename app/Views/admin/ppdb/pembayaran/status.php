<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Ubah Status</legend>
<article>
    <?php
    $status = $pembayaran['status'];
    if (!$status == 1) {
        $status = 'Belum Bayar';
    } else {
        $status = 'Sudah Bayar';
    }
    ?>
    <a href="<?= base_url(); ?>/assets/gambar/bukti/<?= $pembayaran['bukti'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= base_url(); ?>/assets/gambar/bukti/<?= $pembayaran['bukti'] ?>" alt="" class="gambar">
    </a>
    <div class="isi-form">
        <form action="/Admin/PPDB/ubah_status/<?= $pembayaran['id_pembayaran']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id_pengguna" value="<?= $pembayaran['id_pengguna']; ?>">
            <input type="hidden" name="nama" value="<?= $pembayaran['nama']; ?>">
            <input type="hidden" name="admin" value="<?= session()->get('nama') ?>">
            <input type="hidden" name="bukti" value="<?= $pembayaran['bukti']; ?>">
            <div class="baris">
                <div class="kolom-15">
                    <label for="nama">Nama</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama" name="nama" disabled class="<?= ($validasi->hasError('nama')) ? 'tidak-valid' : ''; ?>" placeholder="nama" autofocus value="<?= (old('nama')) ? old('nama') : $pembayaran['nama'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nama') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="admin">Panitia</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="admin" name="admin" disabled class="<?= ($validasi->hasError('admin')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('admin')) ? old('admin') : session()->get('nama') ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('admin') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="tanggal">Tanggal terima</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="tanggal" name="tanggal" class="<?= ($validasi->hasError('tanggal')) ? 'tidak-valid' : ''; ?>" placeholder="tanggal" autofocus value="<?= (old('tanggal')) ? old('tanggal') : $pembayaran['tanggal'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('tanggal') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-15">
                    <label for="status">Status</label>
                </div>
                <div class="kolom-75">
                    <select name="status" id="status">
                        <option value="<?= (old('status')) ? old('status') : $pembayaran['status'] ?>"><?= (old('status')) ? old('status') : $status ?></option>
                        <option value="0">belum bayar</option>
                        <option value="1">sudah bayar</option>
                    </select>
                    <div class="tidak-valid-feedback"><?= $validasi->getError('status') ?></div>
                </div>
            </div>
            <div class="baris">
                <?php
                $status = $pembayaran['status'];
                if (!$status == 1) {
                ?>
                    <input type="submit" value="Bayar">
                <?php
                } else {
                ?>
                    <input type="submit" value="Yakin mau diubah ?" style="background-color: red;">
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</article>
<?= $this->endSection() ?>