<?php

 require "./connect.php";

 if (isset($_POST["update"])){
    $id = $_GET["id"];

    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahun_terbit = $_POST["tahun_terbit"];

    $query = "UPDATE tb_buku SET 
             judul = '$judul', 
             penulis = '$penulis', 
             tahun_terbit = '$tahun_terbit' 
           WHERE id = '$id'";
    $test = mysqli_query($conn,$query);
    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data failed ');
        document.location.href = update.php </script>";
        exit;
    }
 }
