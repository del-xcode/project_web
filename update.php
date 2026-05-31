<?php
include 'koneksi.php';


if (isset($_POST['id_barang'])) {
    $id    = $_POST['id_barang'];
    $nama  = $_POST['nama_barang'];
    $harga = $_POST['harga_jual'];
    $stok  = $_POST['stok'];

    
    $query = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', harga_jual='$harga', stok='$stok' WHERE id_barang='$id'");

    if($query) {
        header("location: index.php");
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
?>