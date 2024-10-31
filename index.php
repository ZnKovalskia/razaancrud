<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta - Razaan Alwan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Mochamad Razaan Alwan</span>
    </nav>

    <div class="container">
        <h4 class="text-center mb-4">Daftar Peserta</h4>

        <?php
        include "koneksi.php";

        // Cek apakah ada kiriman form dari method get
        if (isset($_GET['id_peserta'])) {
            $id_peserta = htmlspecialchars($_GET["id_peserta"]);
            $sql = "DELETE FROM peserta WHERE id_peserta='$id_peserta'";
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak
            if ($hasil) {
                echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
                header("Refresh: 1; url=index.php");
            } else {
                echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
            }
        }
        ?>

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM peserta ORDER BY id_peserta DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($data["sekolah"]); ?></td>
                    <td><?php echo htmlspecialchars($data["jurusan"]); ?></td>
                    <td><?php echo htmlspecialchars($data["no_hp"]); ?></td>
                    <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                    <td>
                        <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning btn-sm">Update</a>
                    </td>
                    <td>
                        <a href="?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Tambah Data</a>
    </div>
</body>
</html>
