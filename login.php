<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek ke database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama_petugas'];
        $_SESSION['status'] = "login";
        
        // Jika berhasil, lempar ke dashboard
        header("location: dashboard.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Kasir Pintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="card shadow border-0" style="width: 24rem;">
    <div class="card-body p-4">
        <h3 class="card-title text-center fw-bold text-dark mb-4">🛒 KASIR LOGIN</h3>
        
        <?php if(isset($error)) { ?>
            <div class="alert alert-danger p-2 text-center" style="font-size: 14px;"><?= $error; ?></div>
        <?php } ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label font-weight-bold">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100 fw-bold shadow-sm">Masuk Sistem</button>
        </form>
    </div>
</div>

</body>
</html>