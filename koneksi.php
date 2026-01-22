<?php
$host = "localhost";
$user = "root";
$pass = "";          // Password default XAMPP
$db   = "db_Kasir";  // Nama database

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
