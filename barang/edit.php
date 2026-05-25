<?php

include '../koneksi/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'");

$d = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Barang</h2>

<form method="POST" action="update.php">

<input type="hidden" name="id" value="<?= $d['id_barang']; ?>">

<div class="mb-3">
    <label>Nama Barang</label>
    <input type="text" name="nama_barang"
    value="<?= $d['nama_barang']; ?>"
    class="form-control">
</div>

<div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga"
    value="<?= $d['harga']; ?>"
    class="form-control">
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok"
    value="<?= $d['stok']; ?>"
    class="form-control">
</div>

<div class="mb-3">
    <label>Kategori</label>
    <input type="text" name="kategori"
    value="<?= $d['kategori']; ?>"
    class="form-control">
</div>

<button type="submit" class="btn btn-primary">
    Update
</button>

</form>

</div>

</body>
</html>