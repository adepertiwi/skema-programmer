<?php
require "koneksi.php"; //menghubungkan koneksi

//PROSES MENGHAPUS DATA MAHASISWA

//data dari halaman home.php dimasukkan ke dalam variable dgn method GET
$nim = $_GET['nim']; 

//query untuk menghapus variabel data mahasiswa pada tabel mahasiswa
$sql = "DELETE from mahasiswa where (nim = '$nim')"; 

//mengeksekusi query delete dan memastikan koneksi terhubung
$delete = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//berhasil delete data mahasiswa
if ($delete){ //jika variabel delete dapat dieksekusi
	//tampilkan messagebox 'Data Mahasiswa telah berhasil dihapus' dan redirect ke halaman home.php
	echo "<script>alert('Data Mahasiswa telah berhasil dihapus.'); document.location='home.php'</script>";
} 
else { //jika variabel delete tidak dapat dieksekusi
	//menampilkan messagebox 'Data Mahasiswa gagal untuk dihapus. silahkan ulangi kembali' dan redirect ke halaman home.php
	echo "<script>alert('Data Mahasiswa gagal dihapus. Silahkan ulangi kembali.'); document.location='home.php'</script>";
}


//menutup koneksi
mysqli_close($koneksi);
?>