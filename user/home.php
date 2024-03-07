<?php
require "koneksi.php";
require "Database.php";

use App\Database;

// Sesuaikan dengan informasi koneksi database Anda
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "uas";

$db = new Database($host, $username, $password, $databaseName);
$conn = $db->connect();

$sql = "SELECT * FROM mahasiswa";
$stmt = $conn->query($sql);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Mahasiswa</title><!--Judul dari website-->

    <!--untuk memasukkan css-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

<body>
    <!-- MENAMPILKAN Data Mahasiswa DALAM FORMAT TABEL -->

    <div class="container">

        <?php

if ($stmt) {
    $num_rows = mysqli_num_rows($stmt);

    if ($num_rows > 0) {
        echo "<h1 class='text-center fw-bold mt-5 mb-5 '>DATA MAHASISWA</h1>";

        $counter = 1; //membuat nomor urut data

        //menampilkan record ke web dalam bentuk tabel
        //membuat header tabel
        echo "<table class='table table-striped table-bordered text-center'>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>";

        while ($data = $stmt->fetch_assoc()) {

            // membuat variable untuk mengubah value
            $jk = ["Perempuan", "Laki-Laki"];

            //memasukkan data ke tabel
            echo "<tr>
                <td>$counter</td>
                <td>{$data['nim']}</td>
                <td>{$data['nama']}</td>
                <td>{$data['alamat']}</td>
                <td>{$jk[$data['jenis_kelamin']]}</td>
                <td><img src=\"images/{$data['foto']}\" alt=\"{$data['nim']}\" width=\"64px\"/></td> 
                <td><a class='btn btn-primary' href=\"user-view.php?nim={$data['nim']}\">Ubah</a> |
                    <a class='btn btn-danger' href=\"user-del.php?nim={$data['nim']}\">Hapus</a>
                </td>
            </tr>";
            $counter++; //increment
        }
        echo "</table>";

    } else {
        //jika result set < 0 (menampilkan pesan "data tidak tersedia")
        echo "<h3>Data Tidak Tersedia!</h3>";
    }

} else {
    echo "<h3>Query tidak berhasil dieksekusi!</h3>";
}

//menutup koneksi
$conn->close();
?>
        <h2>
            <!--untuk menghubungkan halaman home.php dengan user-add.php-->
            <a class="btn btn-secondary d-flex justify-content-center text-uppercase fw-bold" href="user-add.php">Tambah Data Mahasiswa Baru</a>
        </h2>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>