<?php
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama  = $_POST['nama_barang'];
    $harga = $_POST['harga']; 
    $stok  = $_POST['stok'];

    
    $query = mysqli_query($conn, "INSERT INTO barang (nama_barang, harga_jual, stok) VALUES ('$nama', '$harga', '$stok')");

    if($query) {
        header("location: index.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
?>