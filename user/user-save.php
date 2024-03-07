<?php
require "koneksi.php"; //menghubungkan koneksi

//PROSES MENYIMPAN Data Mahasiswa

//data dari halaman user-add.php dimasukkan ke dalam variable dgn method POST
$nim=$_POST['nim']; //input name="nim" 
$nama=$_POST['nama']; //input name="nama"
$alamat=$_POST['alamat']; //input name="alamat"
$kelamin=$_POST['jenis_kelamin']; //input name="jenis kelamin"
	
$nama_file = $_FILES['foto']['name']; //menyimpan nama file pada tabel
$asal_file = $_FILES['foto']['tmp_name']; //digunakan untuk upload file ke server

//directory lokasi Foto pada server
//$_SERVER['DOCUMENT_ROOT'] -> Foder HTDOCS -> localhost
$tujuan_file = $_SERVER['DOCUMENT_ROOT'] . "/uas_210030534/user/images/".$_FILES['foto']['name']; //htdocs > uas_210030534 > user > images


//query untuk mengecek apakah nim sudah ada dalam tabel mahasiswa
$sql ="SELECT * from mahasiswa where (nim = '$nim')";
$hasil = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

if (mysqli_num_rows($hasil) > 0) { //jika result set lebih dari 0 (query tidak dapat dijalankan)
	//nim sudah ada, tampilkan messagebox dan redirect kembali ke halaman user-add.php
	echo "<script>alert('Mahasiswa dengan NIM tersebut sudah ada, silahkan gunakan NIM lainnya.');
		  document.location='user-add.php'</script>";}

else { //jika result set kurang < 0 (query dapat dijalankan)
//data mahasiswa belum ada (melanjutkan simpan data baru)
//menjalankan query insert data ke tabel mahasiswa
$sql="INSERT INTO mahasiswa (nim, nama, alamat, jenis_kelamin, foto)
values ('$nim', '$nama', '$alamat', '$kelamin', '$nama_file');";


//mengeksekusi perintah insert into dan memastikan koneksi sudah terhubung
$save = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

if ($save){ //jika variabel save dapat dieksekusi
	$copy=copy($asal_file, $tujuan_file); //copy file ke server
	
	//tampilkan messagebox berhasil simpan dan redirect ke halaman home.php
	echo "<script>alert('Data Mahasiswa telah berhasil disimpan.'); document.location='home.php'</script>";
} 
else { //jika variabel save tidak dapat dieksekusi
	//echo mysqli_error($save); dan mengulang untuk menginput data pada user-add.php;
	echo "<h1>Data Mahasiswa gagal disimpan!"; 
	echo "<a href=\"user-add.php\">Ulangi Kembali</a>";}
}

//menutup koneksi
mysqli_close($koneksi);


?>