<?php
require "koneksi.php"; // Menghubungkan ke database

// Proses Menghapus Data Dosen

// Data dari halaman home.php dimasukkan ke dalam variabel dengan metode GET
$kode_dosen = $_GET['kode_dosen'];

// Query untuk menghapus data dosen dari tabel dosen
$sql = "DELETE FROM dosen WHERE kode_dosen = '$kode_dosen'";

// Eksekusi query delete dan memastikan koneksi terhubung
$delete = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

// Jika berhasil menghapus data dosen
if ($delete) {
    // Tampilkan pesan berhasil dan redirect ke halaman home.php
    echo "<script>alert('Data Dosen telah berhasil dihapus.'); document.location='home.php'</script>";
} else {
    // Jika gagal menghapus data dosen, tampilkan pesan kesalahan dan redirect ke halaman home.php
    echo "<script>alert('Data Dosen gagal dihapus. Silahkan ulangi kembali.'); document.location='home.php'</script>";
}

// Menutup koneksi dengan database
mysqli_close($koneksi);
?>
