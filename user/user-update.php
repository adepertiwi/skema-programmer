<?php
require "koneksi.php";

//data dari halaman user-view.php dimasukkan ke dalam variable dgn method POST
$nim=$_POST['nim']; //input name="nim" 
$nama=$_POST['nama']; //input name="nama"
$alamat=$_POST['alamat']; //input name="alamat"
$kelamin=$_POST['jenis_kelamin']; //input name="jenis_kelamin"
$nama_file = $_FILES['foto']['name']; //menyimpan nama file pada tabel
$asal_file = $_FILES['foto']['tmp_name']; //digunakan untuk upload file ke server

//directory lokasi Foto pada server
//$_SERVER['DOCUMENT_ROOT'] -> Foder HTDOCS -> localhost
$tujuan_file = $_SERVER['DOCUMENT_ROOT'] . "/program/user/images/".$_FILES['foto']['name']; //htdocs > program > user > images


//membuat query update didalam variabel
$sql = "UPDATE mahasiswa set nama='$nama', alamat='$alamat', jenis_kelamin='$kelamin', foto='$nama_file' where (nim = '$nim')";

//eksekusi perintah update
$update = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//data berhasil di-update
if ($update){
	//tampilkan messagebox berhasil update dan redirect ke halaman home.php
	echo "<script>alert('Data Mahasiswa telah berhasil di-update.'); document.location='home.php'</script>";
}
else {
	// Jika data gagal di-update, tampilkan pesan gagal dan redirect ke halaman user-view.php dengan parameter nim
	echo "<script>alert('Data Mahasiswa gagal di-update. Silahkan ulangi kembali.'); document.location='user-view.php?nim=$nim'</script>";
}

//menutup koneksi
mysqli_close($koneksi);

?>