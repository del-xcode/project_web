<?php
// Mulai session agar sistem tahu session mana yang mau dihapus
session_start();

// Hapus semua variabel session
$_SESSION = array();

// Hancurkan session yang ada di browser
session_destroy();

// Alihkan halaman otomatis kembali ke halaman login utama
header("location: login.php");
exit();
?>