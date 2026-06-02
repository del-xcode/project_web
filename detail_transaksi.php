<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location: login.php");
    exit();
}
include 'koneksi.php';

// 1. Ambil ID Penjualan dari URL
$id_penjualan = $_GET['id'];

// 2. Ambil data induk penjualan (Waktu & Total Bayar)
$query_invoice = mysqli_query($conn, "SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");
$invoice = mysqli_fetch_array($query_invoice);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h5 class="m-0 fw-bold">🧾 Nota Transaksi</h5>
            <span class="badge bg-success">Selesai</span>
        </div>
        <div class="card-body p-4">
            
            <div class="row mb-3">
                <div class="col-6">
                    <small class="text-muted d-block">ID TRANSAKSI</small>
                    <strong class="text-primary">#<?= $id_penjualan; ?></strong>
                </div>
                <div class="col-6 text-end">
                    <small class="text-muted d-block">TANGGAL NOTA</small>
                    <strong><?= isset($invoice['tanggal']) ? $invoice['tanggal'] : date('d-m-Y'); ?></strong>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold mb-3 text-secondary">Daftar Belanja:</h6>
            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead>
                        <tr class="border-bottom text-muted" style="font-size: 0.9rem;">
                            <th>Item</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 3. Ambil rincian barang dengan JOIN ke tabel barang agar namanya terbaca
                        $query_detail = mysqli_query($conn, "SELECT detail_penjualan.*, barang.nama_barang, barang.harga_jual 
                                                             FROM detail_penjualan 
                                                             JOIN barang ON detail_penjualan.id_barang = barang.id_barang 
                                                             WHERE detail_penjualan.id_penjualan = '$id_penjualan'");
                        
                        // Looping data item belanjaan
                        while($item = mysqli_fetch_array($query_detail)) {
                            // Hitung subtotal per item (harga * jumlah)
                            $subtotal = $item['harga_jual'] * $item['jumlah'];
                        ?>
                        <tr>
                            <td>
                                <strong class="d-block"><?= $item['nama_barang']; ?></strong>
                                <small class="text-muted">Rp <?= number_format($item['harga_jual'], 0, ',', '.'); ?></small>
                            </td>
                            <td class="text-center"><?= $item['jumlah']; ?></td>
                            <td class="text-end fw-bold">Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <hr class="mt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold m-0">Total Bayar:</h5>
                <h4 class="fw-bold text-danger m-0">
                    Rp <?= isset($invoice['total_harga']) ? number_format($invoice['total_harga'], 0, ',', '.') : '0'; ?>
                </h4>
            </div>

            <div class="d-flex justify-content-between">
                <a href="dashboard.php" class="btn btn-secondary fw-bold">⬅️ Kembali</a>
                <button onclick="window.print()" class="btn btn-primary fw-bold">🖨️ Cetak Nota</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>