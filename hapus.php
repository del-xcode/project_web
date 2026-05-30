<?php

include '../koneksi/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");

header("location:index.php");

?>