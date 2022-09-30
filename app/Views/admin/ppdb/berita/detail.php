<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten') ?>
<legend>Detail</legend>
<article>
    <table>
        <tr>
            <td colspan="4">
                <h2><?= $berita['judul'] ?></h2>
            </td>
        </tr>
        <tr>
            <td colspan="4"><img src="/assets/gambar/berita/<?= $berita['gambar']; ?>" alt="" class="gambar"></td>
        </tr>
        <tr>
            <td colspan="4">
                <p><?= $berita['deskripsi'] ?></p>
            </td>
        </tr>
        <tr>
            <td><a href="/admin/berita/ubah/<?= $berita['slug'] ?>">Edit</a></td>
            <td>
                <form action="/admin/berita/<?= $berita['id'] ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm('apakah anda ingin menghapus ini ?')">Hapus</button>
                </form>
            </td>
            <td><a href="/admin/berita">Kembali</a></td>
        </tr>
    </table>
</article>
<?= $this->endSection(); ?>