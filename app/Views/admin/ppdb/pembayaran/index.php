<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Pembayaran</legend>
<article>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert sukses">
            <span class="closebtn">&times;</span>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pencarian">
        <form action="" method="POST">
            <input type="text" name="kunci" placeholder="cari nama">
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
            foreach ($pembayaran as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['id_pengguna']; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <?php if (!$p['status'] == 1) { ?>
                        <td>
                            <div class="tombol">
                                <a href="/admin/ppdb/status/<?= $p['id_pengguna'] ?>" style="background-color: red;"><i class="fas fa-money-bill"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="tombol">
                                <a href="/admin/ppdb/cetak_pembayaran/<?= $p['id_pengguna'] ?>" style="background-color: red;"><i class="fas fa-print"></i></a>
                            </div>
                        </td>
                    <?php } else { ?>
                        <td>
                            <div class="tombol">
                                <a href="/admin/ppdb/status/<?= $p['id_pengguna'] ?>"><i class="fas fa-money-bill"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="tombol">
                                <a href="/admin/ppdb/cetak_pembayaran/<?= $p['id_pengguna'] ?>"><i class="fas fa-print"></i></a>
                            </div>
                        </td>
                    <?php
                    } ?>
                    <td><a href="<?= base_url(); ?>/assets/gambar/bukti/<?= $p['bukti'] ?>" target="_blank"><i class="fas fa-eye"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= $pager->links('santri', 'halaman') ?>
</article>
<?= $this->endSection(); ?>