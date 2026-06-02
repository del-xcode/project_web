<?php
include 'koneksi.php';

$total_transaksi = 120;
$total_pendapatan = 3500000;
$produk_terjual = 450;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - db_jual</title>
    <!-- Menggunakan Bootstrap 5 CDN untuk Tampilan Modern -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #212529; color: white; }
        .sidebar a { color: rgba(255,255,255,0.75); text-decoration: none; }
        .sidebar a:hover { color: white; background-color: rgba(255,255,255,0.1); }
        .card-counter { border-left: 5px solid; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR NAVIGATION -->
       <div class="col-md-3 col-lg-2 sidebar p-3 d-flex flex-column">
    <h4 class="text-center mb-4"><i class="fa-solid fa-cash-register me-2"></i>KasirApp</h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="dashboard.php" class="nav-link active bg-primary"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
        </li>
        <li class="mb-2">
            <a href="transaksi.php" class="nav-link p-2 rounded"><i class="fa-solid fa-cart-shopping me-2"></i> Transaksi Baru</a>
        </li>
        <li class="mb-2">
            <a href="index.php" class="nav-link p-2 rounded"><i class="fa-solid fa-box me-2"></i> Stok Produk</a>
        </li>
        <li class="mb-2">
            <a href="laporan.php" class="nav-link p-2 rounded"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Laporan Penjualan</a>
        </li>
    </ul>
    <hr>
    <a href="logout.php" class="text-danger p-2"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
</div>

        <!-- MAIN CONTENT -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Ringkasan</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-secondary p-2"><i class="fa-regular fa-calendar me-2"></i>Hari Ini: <?php echo date('d-m-Y'); ?></span>
                </div>
            </div>

            <!-- CARDS RINGKASAN DATA -->
            <div class="row g-3 mb-4">
                <!-- Card Total Pendapatan -->
                <div class="col-md-4">
                    <div class="card card-counter border-success shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase font-size-13">Total Pendapatan</h6>
                                <h4 class="fw-bold text-success">Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></h4>
                            </div>
                            <div class="fs-1 text-success opacity-50"><i class="fa-solid fa-money-bill-wave"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card Total Transaksi -->
                <div class="col-md-4">
                    <div class="card card-counter border-primary shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase font-size-13">Jumlah Transaksi</h6>
                                <h4 class="fw-bold text-primary"><?php echo $total_transaksi; ?> Transaksi</h4>
                            </div>
                            <div class="fs-1 text-primary opacity-50"><i class="fa-solid fa-receipt"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card Produk Terjual -->
                <div class="col-md-4">
                    <div class="card card-counter border-warning shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase font-size-13">Produk Terjual</h6>
                                <h4 class="fw-bold text-warning"><?php echo $produk_terjual; ?> Pcs</h4>
                            </div>
                            <div class="fs-1 text-warning opacity-50"><i class="fa-solid fa-boxes-stacked"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL TRANSAKSI TERAKHIR -->
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="fa-solid fa-clock-rotate-left me-2 text-secondary"></i>Transaksi Terakhir</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0 align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>ID Transaksi</th>
                                    <th>Waktu</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                  <tbody>
    <?php
    // 1. Ambil 5 transaksi terbaru dari database tabel penjualan
    $no = 1;
    $query_trx = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY id_penjualan DESC LIMIT 5");
    
    // 2. Lakukan perulangan data
    while($d = mysqli_fetch_array($query_trx)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><span class="text-primary fw-bold">#<?= $d['id_penjualan']; ?></span></td>
        <td><?= isset($d['tanggal']) ? $d['tanggal'] : '-'; ?></td>
        <td>Rp <?= number_format($d['total_harga'], 0, ',', '.'); ?></td>
        <td><span class="badge bg-success">Selesai</span></td>
        <td>
            <a href="detail_transaksi.php?id=<?= $d['id_penjualan']; ?>" class="btn btn-outline-primary btn-sm fw-bold">
                <i class="fa-solid fa-eye me-1"></i> Detail
            </a>
        </td>
    </tr>
    <?php } ?>
</tbody>
                               
   
   
                                <!-- Contoh baris data statis -->
                                <tr>
                                    <td>1</td>
                                    <td>#TRX-2026001</td>
                                    <td>10:15 WIB</td>
                                    <td>Rp 150.000</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i> Detail</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>#TRX-2026002</td>
                                    <td>11:00 WIB</td>
                                    <td>#Rp 45.000</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i> Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>