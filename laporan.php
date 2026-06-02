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
    <title>Laporan Penjualan - Kasir Pintar</title>
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
            <li class="nav-item mb-2"><a href="transaksi.php" class="nav-link text-white">Transaksi Baru</a></li>
            <li class="nav-item mb-2"><a href="index.php" class="nav-link text-white">Stok Produk</a></li>
            <li class="nav-item mb-2"><a href="laporan.php" class="nav-link active fw-bold">Laporan Penjualan</a></li>
        </ul>
    </div>
    <div>
        <hr>
        <a href="logout.php" class="nav-link text-danger fw-bold">🚪 Keluar</a>
    </div>
</div>

<div class="main-content">
    <h2 class="fw-bold mb-4">📊 Laporan Penjualan Toko</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white border-0 shadow p-3">
                <div class="card-body">
                    <h6>Total Omset Bulan Ini</h6>
                    <h3 class="fw-bold">Rp 3.500.000</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3">
            <h5 class="m-0 fw-bold text-dark">Riwayat Nota Selesai</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>ID Transaksi</th>
                            <th>Waktu Nota</th>
                            <th>Total Belanja</th>
                            <th>Kasir Petugas</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="text-primary fw-bold">#TRX-2026001</span></td>
                            <td>01-06-2026 | 10:15 WIB</td>
                            <td>Rp 150.000</td>
                            <td><?= $_SESSION['nama']; ?></td>
                            <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><span class="text-primary fw-bold">#TRX-2026002</span></td>
                            <td>02-06-2026 | 11:00 WIB</td>
                            <td>Rp 45.000</td>
                            <td><?= $_SESSION['nama']; ?></td>
                            <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>