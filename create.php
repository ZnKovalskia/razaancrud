<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = input($_POST["nama"]);
        $sekolah = input($_POST["sekolah"]);
        $jurusan = input($_POST["jurusan"]);
        $no_hp = input($_POST["no_hp"]);
        $alamat = input($_POST["alamat"]);

        //Query input menginput data kedalam tabel anggota
        $sql = "INSERT INTO peserta (nama, sekolah, jurusan, no_hp, alamat) VALUES ('$nama', '$sekolah', '$jurusan', '$no_hp', '$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<div class='alert alert-success'>Data berhasil disimpan. <a href='index.php'>Kembali ke daftar</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Data gagal disimpan. Silakan coba lagi.</div>";
        }
    }
    ?>
    <div class="form-container">
        <h2 class="text-center">Form Pendaftaran Peserta</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required />
            </div>
            <div class="form-group">
                <label for="sekolah">Sekolah:</label>
                <input type="text" id="sekolah" name="sekolah" class="form-control" placeholder="Masukkan Nama Sekolah" required />
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required />
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan No HP" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Kirim</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-oP6V2ZJrZ6It4iIHhBf5tSp6qLCP2T2vnkE39n5tk7bJ5xPg5kF0b4m0Vb8+c5/j" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq63A6r6Szz6U9T+Q3P0m5U2t5q2hHJpWgkpaeO5F3JqVpO4I5K" crossorigin="anonymous"></script>
</body>
</html>
