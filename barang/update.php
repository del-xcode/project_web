<?php

include '../koneksi/koneksi.php';

if(isset($_POST['id'])){

$id = $_POST['id'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

mysqli_query($conn, "UPDATE barang SET

nama_barang='$nama',
harga='$harga',
stok='$stok',
kategori='$kategori'

WHERE id_barang='$id'

");

header("location:index.php");

}

?>