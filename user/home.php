<?php
require "koneksi.php"; // Memasukkan file koneksi.php yang berisi pengaturan koneksi ke database.
require "Database.php"; // Memasukkan file Database.php yang berisi definisi kelas Database.

use App\Database; // Mengimpor kelas Database dari namespace App.

// Sesuaikan dengan informasi koneksi database Anda
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "user";

// Membuat objek dari kelas Database dengan parameter koneksi yang telah ditentukan.
$db = new Database($host, $username, $password, $databaseName);
$conn = $db->connect();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Mahasiswa</title><!--Judul dari website-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .spasi {
            margin-bottom: 200px; /* Menambahkan spasi di bawah tabel */
        }
    </style>

</head>

<body>
    <div class="container">
        <?php
        // Menampilkan data mahasiswa
        $sql_mahasiswa = "SELECT * FROM mahasiswa";
        $stmt_mahasiswa = $conn->query($sql_mahasiswa);

        if ($stmt_mahasiswa) {
            $num_rows_mahasiswa = mysqli_num_rows($stmt_mahasiswa);

            if ($num_rows_mahasiswa > 0) {
                echo "<h1 class='text-center fw-bold mt-5 mb-5'>DATA MAHASISWA</h1>";

                $counter_mahasiswa = 1;

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

                while ($data_mahasiswa = $stmt_mahasiswa->fetch_assoc()) {
                    $jenis_kelamin_mahasiswa = $data_mahasiswa['jenis_kelamin'] == 1 ? 'Laki-Laki' : 'Perempuan';

                    echo "<tr>
                            <td>$counter_mahasiswa</td>
                            <td>{$data_mahasiswa['nim']}</td>
                            <td>{$data_mahasiswa['nama']}</td>
                            <td>{$data_mahasiswa['alamat']}</td>
                            <td>$jenis_kelamin_mahasiswa</td>
                            <td><img src=\"images/{$data_mahasiswa['foto']}\" alt=\"{$data_mahasiswa['nim']}\" width=\"64px\"/></td>
                            <td><a class='btn btn-primary' href=\"user-view.php?nim={$data_mahasiswa['nim']}\">Ubah</a> |
                                <a class='btn btn-danger' href=\"user-del.php?nim={$data_mahasiswa['nim']}\">Hapus</a>
                            </td>
                        </tr>";
                    $counter_mahasiswa++;
                }
                echo "</table>";
            } else {
                echo "<h3>Data Mahasiswa Tidak Tersedia!</h3>";
            }
        } else {
            echo "<h3>Query untuk Data Mahasiswa tidak berhasil dieksekusi!</h3>";
        }

        echo " <h2>
        <a class='btn btn-secondary d-flex justify-content-center text-uppercase fw-bold' href='user-add.php'>Tambah Data Mahasiswa Baru</a>
        </h2>";

        // Menambahkan spasi antara tabel mahasiswa dan tombol tambah data dosen
        echo "<div class='spasi'></div>";

        // Menampilkan data dosen
        $sql_dosen = "SELECT * FROM dosen";
        $stmt_dosen = $conn->query($sql_dosen);

        if ($stmt_dosen) {
            $num_rows_dosen = mysqli_num_rows($stmt_dosen);

            if ($num_rows_dosen > 0) {
                echo "<h1 class='text-center fw-bold mt-5 mb-5'>DATA DOSEN</h1>";

                $counter_dosen = 1;

                echo "<table class='table table-striped table-bordered text-center'>
                        <tr>
                            <th>No</th>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Jabatan Fungsional</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>";

                while ($data_dosen = $stmt_dosen->fetch_assoc()) {
                    $jenis_kelamin_dosen = $data_dosen['jenis_kelamin'] == 1 ? 'Laki-Laki' : 'Perempuan';

                    echo "<tr>
                            <td>$counter_dosen</td>
                            <td>{$data_dosen['kode_dosen']}</td>
                            <td>{$data_dosen['nama_dosen']}</td>
                            <td>{$data_dosen['jabatan_fungsional']}</td>
                            <td>$jenis_kelamin_dosen</td>
                            <td>{$data_dosen['alamat']}</td>
                            <td>{$data_dosen['no_telp']}</td>
                            <td>{$data_dosen['tanggal_lahir']}</td>
                            <td><a class='btn btn-primary' href=\"dosen-view.php?kode_dosen={$data_dosen['kode_dosen']}\">Ubah</a> |
                                <a class='btn btn-danger' href=\"dosen-del.php?kode_dosen={$data_dosen['kode_dosen']}\">Hapus</a>
                            </td>
                        </tr>";
                    $counter_dosen++;
                }
                echo "</table>";
            } else {
                echo "<h3>Data Dosen Tidak Tersedia!</h3>";
            }
        } else {
            echo "<h3>Query untuk Data Dosen tidak berhasil dieksekusi!</h3>";
        }

        // Tombol untuk menambah data dosen baru
        echo "<h2>
        <a class='btn btn-secondary d-flex justify-content-center text-uppercase fw-bold' href='dosen-add.php'>Tambah Data Dosen Baru</a>
        </h2>";

        $conn->close();
        ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
