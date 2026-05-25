<?php
$db_host = "localhost";
$db_root = "root";
$db_pass = "";
$db_name = "db_jual";

$conn = mysqli_connect($db_host, $db_root, $db_pass, $db_name);

if (mysql_connect_error()) {
    echo "koneksi gagal";
   } else {
    echo "koneksi berhasil";
   }
?>