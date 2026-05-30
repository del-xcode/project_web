<?php

include '../koneksi/koneksi.php';

if(isset($_POST['nama_barang'])){

$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

mysqli_query($conn, "INSERT INTO barang VALUES(
    '',
    '$nama',
    '$harga',
    '$stok',
    '$kategori'
)");

header("location:index.php");
}
?>