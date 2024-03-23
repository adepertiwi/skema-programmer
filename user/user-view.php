<?php
require "koneksi.php"; // Menghubungkan ke file koneksi.php untuk melakukan koneksi ke database.
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Mahasiswa</title> <!--Judul dari website-->
<link type="text/css" href="style.css" rel="stylesheet"> <!--untuk memasukkan css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="container">

<!--melakukan validasai terhadap inputan data menggunakan JavaScript -->
<!--mengecek apakah data telah terisi atau belum-->
<script type="text/javascript">
function cek_form(frm){ //function untuk mengecek data didalam form
	if(frm.nim.value==""){ //jika form nim nilainya kosong
		alert("Silahkan lengkapi kolom NIM"); //menampilkan peringatan jika form nim belum terisi
		frm.nim.focus();
		return false;
	}else if(frm.nama.value!=""){  //jika form nama nilainya kosong
		alert("Silahkan lengkapi kolom Nama"); //menampilkan peringatan jika form nama belum terisi
		frm.nama.focus();
		return false;
	}else if(frm.alamat.value==""){ //jika form alamat nilainya kosong
		alert("Silahkan lengkapi kolom Alamat"); //menampilkan peringatan jika form alamat belum terisi
		frm.alamat.focus();
		return false;
	}else return true;
}
</script>

</head>
<body>

<!--MENAMPILKAN DATA MAHASISWA YANG AKAN DI-UPDATE -->

<?php
//data dari halaman home.php dimasukkan ke dalam variable dgn method GET
$nim=$_GET['nim']; 

//query untuk mengecek nim sesuai dengan data yang ada
$sql ="SELECT * from mahasiswa where (nim = '$nim')";

//mengeksekusi query select * from dan memastikan koneksi sudah terhubung
$hasil = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//jika result set lebih dari 0 (query dapat dijalankan/record dapat ditemukan)
if (mysqli_num_rows($hasil) > 0) {
	
//Menampilkan data mahasiswa pada script HTML
$data=mysqli_fetch_array($hasil);
?>

<!--membuat sebuah form untuk menginput data yang nantinya akan diproses pada halaman user-save.php-->
<form name="form1" action="user-update.php" method="POST" enctype="multipart/form-data">
<!--method:POST -> ID/pengenal yg akan diparsing adalah atribut "name" pada masing-masing control-->
    
 <!--membuat isi dari form untuk menginputkan data-->
<div class="d-flex justify-content-center align-items-center">
<div class="card mt-5" style="width: 30rem;">
<h4 class='text-center fw-bold mt-5'>UBAH DATA MAHASISWA</h4>
<table class="table table-borderless d-flex justify-content-center mt-5">
        <tr>
            <td>NIM</td>
           <!--menyisipkan kode PHP pada script HTML-->
            <td><input class="form-control" type="text" name="nim" class="txt" value="<?php echo "$data[nim]"; ?>" readonly></td>
        </tr>	
        <tr>
            <td>Nama</td>
            <td><input class="form-control" type="text" name="nama" class="txt" maxlength="50" value="<?php echo "$data[nama]"; ?>"></td>
        </tr>
         <tr>
            <td>Alamat</td>
            <td><input class="form-control" type="text" name="alamat" class="txt" maxlength="50" value="<?php echo "$data[alamat]"; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>       
            <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="1" <?php if($data['jenis_kelamin']==1){ echo "checked=checked";}  ?>/> Laki-Laki
            <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="0" <?php if($data['jenis_kelamin']==0){ echo "checked=checked";}  ?>/> Perempuan
            </td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input class="form-control" type="file" name="foto" id="formFile"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class='btn btn-success' type="submit" value="Simpan" class="btn">
                <a class='btn btn-danger' href="home.php">Batal Edit</a>
            </td>
            <!--untuk menghubungkan ke halaman user-add.php dengan halaman home.php-->
        </tr>
    </table>
    </div>
    </div>
</form>


<?php
}

else { //jika result set kurang < 0 (query tidak dapat dijalankan/record tidak dapat ditemukan)
	echo "<script>alert('Data Mahasiswa tidak ditemukan.');
		  document.location='home.php'</script>";
}
?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
