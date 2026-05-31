<?php

include 'koneksi.php';


$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'");
$d = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-warning text-white fw-bold py-3">
            📝 Edit Data Barang
        </div>
        <div class="card-body p-4">
            <form action="update.php" method="POST">
                
                <input type="hidden" name="id_barang" value="<?= $d['id_barang']; ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?= $d['nama_barang']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Harga Jual (Rp)</label>
                    <input type="number" name="harga_jual" class="form-control" value="<?= $d['harga_jual']; ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $d['stok']; ?>" required>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning text-white fw-bold shadow-sm">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>