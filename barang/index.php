<?php
include '../koneksi/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2>Data Barang</h2>

    <a href="../index.php" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <a href="tambah.php" class="btn btn-primary mb-3">
        + Tambah Barang
    </a>

    <table class="table table-bordered table-striped">

        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while($d = mysqli_fetch_array($data)){
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td>Rp <?= $d['harga']; ?></td>
            <td><?= $d['stok']; ?></td>
            <td><?= $d['kategori']; ?></td>

            <td>

                <a href="edit.php?id=<?= $d['id_barang']; ?>"
                class="btn btn-warning btn-sm">
                Edit
                </a>

                <a href="hapus.php?id=<?= $d['id_barang']; ?>"
                class="btn btn-danger btn-sm">
                Hapus
                </a>

            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>