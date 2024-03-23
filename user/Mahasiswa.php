<?php
namespace App;


// Definisi kelas Mahasiswa dengan atribut dan metode terkait
class Mahasiswa {
    private $nim; // Atribut untuk menyimpan NIM mahasiswa.
    private $nama; // Atribut untuk menyimpan nama mahasiswa.
    private $alamat; // Atribut untuk menyimpan alamat mahasiswa.
    private $jenisKelamin; // Atribut untuk menyimpan jenis kelamin mahasiswa.
    private $foto; // Atribut untuk menyimpan nama file foto mahasiswa.


    // Constructor untuk membuat objek Mahasiswa baru dengan memberikan nilai awal pada atribut.
    public function __construct($nim, $nama, $alamat, $jenisKelamin, $foto) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->jenisKelamin = $jenisKelamin;
        $this->foto = $foto;
    }

    // Getter dan setter untuk masing-masing atribut
    // Metode untuk mengambil nilai NIM dari objek Mahasiswa.
    public function getNim() {
        return $this->nim;
    }

    // Metode untuk mengatur nilai NIM pada objek Mahasiswa.
    public function setNim($nim) { 
        $this->nim = $nim;
    }

    // Metode untuk mengambil nilai nama dari objek Mahasiswa.
    public function getNama() { 
        return $this->nama;
    }

    // Metode untuk mengatur nilai nama pada objek Mahasiswa.
    public function setNama($nama) { 
        $this->nama = $nama;
    }

     // Metode untuk mengambil nilai alamat dari objek Mahasiswa.
    public function getAlamat() {
        return $this->alamat;
    }

    // Metode untuk mengatur nilai alamat pada objek Mahasiswa.
    public function setAlamat($alamat) { 
        $this->alamat = $alamat;
    }

    // Metode untuk mengambil nilai jenis kelamin dari objek Mahasiswa.
    public function getJenisKelamin() {
        return $this->jenisKelamin;
    }

    // Metode untuk mengatur nilai jenis kelamin pada objek Mahasiswa.
    public function setJenisKelamin($jenisKelamin) {
        $this->jenisKelamin = $jenisKelamin;
    }

    // Metode untuk mengambil nama file foto dari objek Mahasiswa.
    public function getFoto() {
        return $this->foto;
    }

    // Metode untuk mengatur nama file foto pada objek Mahasiswa.
    public function setFoto($foto) {
        $this->foto = $foto;
    }

}
?>
