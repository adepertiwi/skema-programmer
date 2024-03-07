<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Mahasiswa</title>
    <!--Judul dari website-->
    <link type="text/css" href="style.css" rel="stylesheet">
    <!--untuk memasukkan css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="container">

        <!--melakukan validasi terhadap inputan data menggunakan JavaScript -->
        <!--mengecek apakah data telah terisi atau belum-->
        <script type="text/javascript">
            function cek_form(frm) { //function untuk mengecek data didalam form
                if (frm.nim.value == "") { //jika form nim nilainya kosong
                    alert("Silahkan lengkapi kolom NIM"); //menampilkan peringatan jika form nama belum terisi
                    frm.nim.focus();
                    return false;
                } else if (frm.nama.value == "") { //jika form nama nilainya kosong
                    alert("Silahkan lengkapi kolom Nama"); //menampilkan peringatan jika form nama belum terisi
                    frm.nama.focus();
                    return false;
                } else if (frm.alamat.value == "") { //jika form alamat nilainya kosong
                    alert("Silahkan lengkapi kolom Alamat"); //menampilkan peringatan jika form alamat belum terisi
                    frm.alamat.focus();
                    return false;
                } else if (frm.jenis_kelamin.value == "") { //jika form jns kelammin nilainya kosong
                    alert("Silahkan pilih Jenis kelamin"); //menampilkan peringatan jika form jns kelamin belum terisi
                    frm.jenis_kelamin.focus();
                    return false;
                } else if (frm.foto.value == "") { //jika form foto nilainya kosong
                    alert("Silahkan pilih file Foto"); //menampilkan peringatan jika form foto belum terisi
                    frm.foto.focus();
                    return false;
                } else return true;
            }
        </script>
    </div>

</head>

<body>
    <!--FORM UNTUK MENAMBAHKAN DATA MAHASISWA BARU -->

    <!--membuat sebuah form untuk menginput data yang nantinya akan diproses pada halaman user-save.php-->
    <form name="form1" action="user-save.php" method="post" onSubmit="return cek_form(this)"
        enctype="multipart/form-data">
        <!--method:POST -> ID/pengenal yg akan diparsing adalah atribut "name" pada masing-masing control-->
        <!--enctype="multipart/form-data" digunakan untuk kebutuhan upload file -->



        <!--membuat isi dari form untuk menginputkan data-->
        <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card mt-5" style="width: 30rem;">
            <h4 class='text-center fw-bold mt-5 mb- 5'>TAMBAH DATA MAHASISWA</h4>
            <table class="table table-borderless d-flex justify-content-center mt-5">
                <tr>
                    <td>NIM</td>
                    <td><input class="form-control" type="text" name="nim" class="txt" maxlength="9"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input class="form-control" type="text" name="nama" class="txt" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input class="form-control" type="text" name="alamat" class="txt" maxlength="50"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="1"> Laki - Laki
                        <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="0"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>
                        <input class="form-control" type="file" name="foto" id="formFile">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class='btn btn-success' type="submit" value="Simpan" class="btn">
                        <input class='btn btn-danger' type="reset" value="Reset" class="btn">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
    </div>
    
    <div class="container d-flex justify-content-center align-items-center mt-3">
        <a class="btn btn-outline-secondary justify-content-center text-uppercase fw-bold" href="home.php">Kembali</a>
        <!--untuk menghubungkan kembali ke halaman home.php-->

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>