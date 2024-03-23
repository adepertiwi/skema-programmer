<?php
$host="localhost"; //variabel host itu merupakan host dari databasenya dengan nama localhost
$username="root"; //variabel username merupakan root dari database
$password="";
$database="user"; //variabel database yang diberi nama user

//membuat koneksi
$koneksi=mysqli_connect($host, $username, $password, $database);

//cek koneksi
if (!$koneksi) {
	//error
	die("Koneksi gagal: " .  mysqli_connect_error($koneksi));	
}
?>