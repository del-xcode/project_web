<?php
include 'koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");

    if($query) {
        header("location: index.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
?>