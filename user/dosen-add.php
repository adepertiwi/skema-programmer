<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Dosen</title>
    <!--Judul dari website-->
    <link type="text/css" href="style.css" rel="stylesheet">
    <!--untuk memasukkan css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!--FORM UNTUK MENAMBAHKAN DATA DOSEN BARU -->

    <!--membuat sebuah form untuk menginput data yang nantinya akan diproses pada halaman dosen-save.php-->
    <form name="form2" action="dosen-save.php" method="post" onSubmit="return cek_form(this)"
        enctype="multipart/form-data">
        <!--method:POST -> ID/pengenal yg akan diparsing adalah atribut "name" pada masing-masing control-->
        <!--enctype="multipart/form-data" digunakan untuk kebutuhan upload file -->


        <!--membuat isi dari form untuk menginputkan data-->
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="card mt-5" style="width: 30rem;">
                    <h4 class='text-center fw-bold mt-5 mb- 5'>TAMBAH DATA DOSEN</h4>
                    <table class="table table-borderless d-flex justify-content-center mt-5">
                        <tr>
                            <td>Kode Dosen</td>
                            <td><input class="form-control" type="text" name="kode_dosen" class="txt" maxlength="10"></td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td><input class="form-control" type="text" name="nama_dosen" class="txt" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td>Jabatan Fungsional</td>
                            <td>
                                <select class="form-select" name="jabatan_fungsional">
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Professor">Professor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="1"> Laki - Laki
                                <input class="form-check-input" name="jenis_kelamin" type="radio" id="kelamin" value="0"> Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input class="form-control" type="text" name="alamat" class="txt" maxlength="100"></td>
                        </tr>
                        <tr>
                            <td>No. Telp</td>
                            <td><input class="form-control" type="text" name="no_telp" class="txt" maxlength="15"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input class="form-control" type="date" name="tanggal_lahir"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class='btn btn-success' type="submit" value="Simpan" class="btn">
                                <input class='btn btn-danger' type="reset" value="Reset" class="btn">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center mt-3">
            <a class="btn btn-outline-secondary justify-content-center text-uppercase fw-bold" href="home.php">Kembali</a>
            <!--untuk menghubungkan kembali ke halaman home.php-->
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
