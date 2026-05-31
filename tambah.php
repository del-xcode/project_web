<!DOCTYPE html>
<html>
<head>

    <title>Tambah Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Barang</h2>

<form method="POST" action="simpan.php">

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

</form>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white fw-bold">🛒 Tambah Barang Baru</div>
        <div class="card-body">
            <form action="simpan.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required placeholder="Contoh: Indomie Goreng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Jual (Rp)</label>
                    <input type="number" name="harga_jual" class="form-control" required placeholder="Contoh: 3500">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok Awal</label>
                    <input type="number" name="stok" class="form-control" required placeholder="Contoh: 100">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary fw-bold">Simpan Barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>