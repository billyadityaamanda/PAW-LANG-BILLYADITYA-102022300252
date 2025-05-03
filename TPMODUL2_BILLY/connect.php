<?php
$host = 'localhost';   // Sesuai dengan konfigurasi XAMPP
$user = 'root';        // Default user XAMPP
$pass = '';            // Default password XAMPP (kosong)
$db   = 'db_perpustakaan'; // Nama database

// Koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
