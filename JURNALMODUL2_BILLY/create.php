<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_POST['create'])) {  
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);


    var_dump($judul, $penulis, $tahun_terbit);

    // Definisikan query untuk insert data
    $query = "INSERT INTO tb_buku (judul, penulis, tahun_terbit) 
              VALUES ('$judul', '$penulis', '$tahun_terbit')";

    // Eksekusi query dan cek hasil
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='katalog_buku.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Akses tidak valid!'); window.location='katalog_buku.php';</script>";
}
?>
