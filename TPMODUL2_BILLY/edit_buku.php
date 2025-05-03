<?php
include 'connect.php';

// Cek apakah parameter ID dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data buku berdasarkan ID
    $query = "SELECT * FROM tb_buku WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $buku = mysqli_fetch_assoc($result);
    } else {
        echo "Data buku tidak ditemukan.";
        exit;
    }
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Query untuk update data
    $query = "UPDATE tb_buku SET 
                judul = '$judul', 
                penulis = '$penulis', 
                tahun_terbit = '$tahun_terbit' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Ubah Detail Buku</title>
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="container mt-5">
        <h1 class="text-center">Ubah Detail Buku</h1>
        <div class="col-md-4 mx-auto p-3">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="judul" value="<?= $buku['judul'] ?>" required>
                            <label for="judul">Judul</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="penulis" value="<?= $buku['penulis'] ?>" required>
                            <label for="penulis">Penulis</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" required>
                            <label for="tahun_terbit">Tahun Terbit</label>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary w-100">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
