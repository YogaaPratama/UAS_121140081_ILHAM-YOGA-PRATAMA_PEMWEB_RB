<?php
// Mulai atau resume sesi yang sudah ada
session_start();

// Menghancurkan (menghapus) semua data sesi
session_destroy();

// Mengarahkan pengguna kembali ke halaman "index.php"
header("location:index.php");
?>
