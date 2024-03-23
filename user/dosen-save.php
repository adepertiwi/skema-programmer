<?php
require "koneksi.php"; // Menghubungkan ke database

// Data dari halaman dosen-add.php dimasukkan ke dalam variabel menggunakan metode POST
$kode_dosen = $_POST['kode_dosen']; // Input name="kode_dosen"
$nama_dosen = $_POST['nama_dosen']; // Input name="nama_dosen"
$jabatan_fungsional = $_POST['jabatan_fungsional']; // Input name="jabatan_fungsional"
$jenis_kelamin = $_POST['jenis_kelamin']; // Input name="jenis_kelamin"
$alamat = $_POST['alamat']; // Input name="alamat"
$no_telp = $_POST['no_telp']; // Input name="no_telp"
$tanggal_lahir = $_POST['tanggal_lahir']; // Input name="tanggal_lahir"

// Query untuk mengecek apakah kode dosen sudah ada dalam tabel dosen
$sql = "SELECT * FROM dosen WHERE kode_dosen = '$kode_dosen'";
$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

if (mysqli_num_rows($hasil) > 0) {
    // Jika kode dosen sudah ada, tampilkan pesan kesalahan dan redirect kembali ke halaman dosen-add.php
    echo "<script>alert('Dosen dengan kode tersebut sudah ada, silahkan gunakan kode lain.');
          document.location='dosen-add.php'</script>";
} else {
    // Jika kode dosen belum ada, lanjutkan penyimpanan data baru
    // Query untuk menyimpan data dosen ke dalam tabel dosen
    $sql = "INSERT INTO dosen (kode_dosen, nama_dosen, jabatan_fungsional, jenis_kelamin, alamat, no_telp, tanggal_lahir)
            VALUES ('$kode_dosen', '$nama_dosen', '$jabatan_fungsional', '$jenis_kelamin', '$alamat', '$no_telp', '$tanggal_lahir')";

    // Eksekusi query penyimpanan data dosen
    $save = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

    if ($save) {
        // Jika penyimpanan berhasil, tampilkan pesan berhasil dan redirect ke halaman home.php
        echo "<script>alert('Data Dosen berhasil disimpan.'); document.location='home.php'</script>";
    } else {
        // Jika penyimpanan gagal, tampilkan pesan kesalahan dan tautan untuk mengulangi pengisian data
        echo "<h1>Data Dosen gagal disimpan!";
        echo "<a href=\"dosen-add.php\">Ulangi Kembali</a>";
    }
}

// Menutup koneksi dengan database
mysqli_close($koneksi);
?>
