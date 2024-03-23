<?php
require "koneksi.php";

// Data dari halaman dosen-view.php dimasukkan ke dalam variabel dengan metode POST
$kode_dosen = $_POST['kode_dosen']; // Input name="kode_dosen"
$nama_dosen = $_POST['nama_dosen']; // Input name="nama_dosen"
$jabatan_fungsional = $_POST['jabatan_fungsional']; // Input name="jabatan_fungsional"
$jenis_kelamin = $_POST['jenis_kelamin']; // Input name="jenis_kelamin"
$alamat = $_POST['alamat']; // Input name="alamat"
$no_telp = $_POST['no_telp']; // Input name="no_telp"
$tanggal_lahir = $_POST['tanggal_lahir']; // Input name="tanggal_lahir"

// Membuat query update
$sql = "UPDATE dosen SET 
            nama_dosen = '$nama_dosen', 
            jabatan_fungsional = '$jabatan_fungsional', 
            jenis_kelamin = '$jenis_kelamin', 
            alamat = '$alamat', 
            no_telp = '$no_telp', 
            tanggal_lahir = '$tanggal_lahir' 
        WHERE kode_dosen = '$kode_dosen'";

// Eksekusi perintah update
$update = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

// Jika data berhasil di-update
if ($update) {
    // Tampilkan pesan berhasil update dan redirect ke halaman home.php
    echo "<script>alert('Data Dosen telah berhasil di-update.'); document.location='home.php'</script>";
} else {
    // Jika data gagal di-update, tampilkan pesan gagal dan redirect ke halaman dosen-view.php dengan parameter kode_dosen
    echo "<script>alert('Data Dosen gagal di-update. Silahkan ulangi kembali.'); document.location='dosen-view.php?kode_dosen=$kode_dosen'</script>";
}

// Menutup koneksi
mysqli_close($koneksi);
?>
