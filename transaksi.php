<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location: login.php");
    exit();
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Baru - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { height: 100vh; width: 250px; position: fixed; top: 0; left: 0; background-color: #212529; padding-top: 20px; }
        .main-content { margin-left: 250px; padding: 30px; }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column justify-content-between p-3 text-white">
    <div>
        <h4 class="text-center fw-bold mb-4">⌨️ KasirApp</h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link text-white">Dashboard</a></li>
            <li class="nav-item mb-2"><a href="transaksi.php" class="nav-link active fw-bold">Transaksi Baru</a></li>
            <li class="nav-item mb-2"><a href="index.php" class="nav-link text-white">Stok Produk</a></li>
            <li class="nav-item mb-2"><a href="laporan.php" class="nav-link text-white">Laporan Penjualan</a></li>
        </ul>
    </div>
    <div>
        <hr>
        <a href="logout.php" class="nav-link text-danger fw-bold">🚪 Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Input Transaksi Baru</h2>
        <span class="badge bg-secondary p-2">Kasir: <?= $_SESSION['nama']; ?></span>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card shadow border-0 p-4 mb-4">
                <h5 class="fw-bold text-primary mb-3">Pilih Produk</h5>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <select class="form-select" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php 
                            $brg = mysqli_query($conn, "SELECT * FROM barang");
                            while($b = mysqli_fetch_array($brg)) {
                                echo "<option value='".$b['id_barang']."'>".$b['nama_barang']." (Stok: ".$b['stok'].")</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Beli</label>
                        <input type="number" class="form-control" min="1" value="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">+ Tambah ke Keranjang</button>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow border-0 p-4">
                <h5 class="fw-bold text-success mb-3">Keranjang Belanja</h5>
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th width="15%">Qty</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Beras 1kg</strong></td>
                            <td>Rp 15.000</td>
                            <td>2</td>
                            <td>Rp 30.000</td>
                            <td><button class="btn btn-danger btn-sm">❌</button></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h4 class="fw-bold">Total Bayar:</h4>
                    <h3 class="fw-bold text-danger">Rp 30.000</h3>
                </div>
                <button class="btn btn-success w-100 fw-bold mt-3 py-2">💾 BERHASIL BAYAR (SIMPAN)</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>