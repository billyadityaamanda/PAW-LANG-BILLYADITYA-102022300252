<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_POST['update'])) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $judul = mysqli_real_escape_string($conn, trim($_POST['judul']));
    $penulis = mysqli_real_escape_string($conn, trim($_POST['penulis']));
    $tahun_terbit = intval($_POST['tahun_terbit']);  

    if (empty($judul) || empty($penulis) || empty($tahun_terbit)) {
        echo "<script>alert('Semua data harus diisi!'); window.location='edit_buku.php?id=$id';</script>";
        exit;
    }

    // Buatlah query untuk update data
    $query = "UPDATE tb_buku 
              SET judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit'
              WHERE id = $id";


    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>