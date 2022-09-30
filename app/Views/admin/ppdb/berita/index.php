<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Berita</legend>
<article>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert sukses">
            <span class="closebtn">&times;</span>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pencarian">
        <form action="" method="POST">
            <input type="text" name="kunci" placeholder="cari berita">
            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <td colspan="7"><a href="/admin/berita/tambah">+ Tambahkan data berita</a></td>
            </tr>
            <tr>
                <th>no</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th colspan="3">Aksi</th>
            </tr>
            <?php
            $i = 1 + (5 * ($halaman - 1));
            foreach ($berita as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['judul']; ?></td>
                    <td><img src="<?= base_url(); ?>/assets/gambar/berita/<?= $p['gambar']; ?>" alt="" style="width: 100px;"></td>
                    <td>
                        <form action="/admin/berita/<?= $p['id'] ?>" method="POST">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="background-color: red; cursor: pointer;" onclick="return confirm('apakah anda ingin menghapus ini ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td><a href="/admin/berita/ubah/<?= $p['slug'] ?>"><i class="fas fa-wrench"></i></a></td>
                    <td><a href="/admin/berita/detail/<?= $p['slug']; ?>"><i class="fas fa-info"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $pager->links('berita', 'halaman') ?>
</article>
<?= $this->endSection(); ?>