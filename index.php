<?php
include('koneksi.php');

// Ambil data dari database
$data = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">🛒 KASIR PINTAR</a>
    <div class="navbar-nav ms-auto"> <a class="nav-item nav-link active" href="#">Data Barang</a>
      <a class="nav-item nav-link" href="#">Transaksi</a>
      <a class="nav-item nav-link" href="#">Laporan</a>
    </div>
  </div>
</nav>

<div class="container">
  
  <div class="card shadow border-0 mt-4">
    
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
      <h4 class="m-0 fw-bold text-primary">Daftar Stok Barang</h4>
      <div>
        <a href="../index.php" class="btn btn-secondary btn-sm me-2">Kembali</a>
        <a href="tambah.php" class="btn btn-primary btn-sm fw-bold shadow-sm">+ Tambah Barang</a>
      </div>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th width="5%">No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th width="12%">Stok</th>
              <th class="text-center" width="20%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            // Looping PHP dimasukkan ke dalam tabel desain baru
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><strong><?= $d['nama_barang']; ?></strong></td>
              <td>Rp <?= number_format($d['harga_jual'], 0, ',', '.'); ?></td>
              <td><?= $d['stok']; ?></td>
              <td class="text-center">
                <a href="edit.php?id=<?= $d['id_barang']; ?>" class="btn btn-warning btn-sm text-white fw-bold shadow-sm">Edit</a>
                <a href="hapus.php?id=<?= $d['id_barang']; ?>" class="btn btn-danger btn-sm fw-bold shadow-sm">Hapus</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>