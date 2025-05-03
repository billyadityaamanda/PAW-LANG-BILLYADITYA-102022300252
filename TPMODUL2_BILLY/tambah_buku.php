<?php
include 'connect.php';

// ==================1==================
// Definisikan query untuk mengambil semua data buku
$query = "SELECT * FROM tb_buku";
$result = mysqli_query($conn, $query);

$bukus = [];
while ($row = mysqli_fetch_assoc($result)) {
    $bukus[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Katalog Buku</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tahun</th>
                  <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bukus) == 0) : ?>
                    <tr>
                        <th colspan="7" class="text-center">TIDAK ADA DATA DALAM KATALOG</th>
                    </tr>
                <?php endif;?>
                <?php foreach ($bukus as $buku) : ?>
                    <tr>
                        <td><?=$buku['id']?></td>
                        <td><?=$buku['judul']?></td>
                        <td><?=$buku['penulis']?></td>
                        <td><?=$buku['tahun_terbit']?></td>
                        <td>
                            <a href="edit_buku.php?id=<?=$buku['id']?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?=$buku['id']?>" class="btn btn-danger" >Delete</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h1>Tambah Buku</h1>
        <div class="col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <form action="create.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="judul" id="judul" required>
                            <label for="judul">Judul</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="penulis" id="penulis" required>
                            <label for="penulis">Penulis</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" required>
                            <label for="tahun_terbit">Tahun Terbit</label>
                        </div>
                        <button type="submit" name="create" id="create" class="btn btn-primary mb-3 mt-3 w-100">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
