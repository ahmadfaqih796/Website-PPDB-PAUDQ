<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Santri</legend>
<article>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert sukses">
            <span class="closebtn">&times;</span>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pencarian">
        <form action="" method="POST">
            <input type="text" name="kunci" placeholder="cari santri">
            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>no</th>
                <th>Id Pengguna</th>
                <th>Nama</th>
                <th colspan="3">Aksi</th>
            </tr>
            <?php
            $i = 1 + (5 * ($halaman - 1));
            foreach ($santri as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['id_pengguna']; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td>
                        <form action="/admin/ppdb/<?= $p['id_register'] ?>" method="POST">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="background-color: red; cursor: pointer;" onclick="return confirm('apakah anda ingin menghapus ini ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td><a href="/admin/ppdb/ubah_santri/<?= $p['id_pengguna'] ?>"><i class="fas fa-wrench"></i></a></td>
                    <td><a href="/admin/ppdb/cetak_formulir/<?= $p['id_pengguna'] ?>"><i class="fas fa-print"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $pager->links('santri', 'halaman') ?>
</article>
<?= $this->endSection(); ?>