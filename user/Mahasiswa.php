<?php
namespace App;


// Definisi kelas Mahasiswa dengan atribut dan metode terkait
class Mahasiswa {
    private $nim;
    private $nama;
    private $alamat;
    private $jenisKelamin;
    private $foto;

    // Constructor untuk membuat objek Mahasiswa baru
    public function __construct($nim, $nama, $alamat, $jenisKelamin, $foto) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->jenisKelamin = $jenisKelamin;
        $this->foto = $foto;
    }

    // Getter dan setter untuk masing-masing atribut
    public function getNim() {
        return $this->nim;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    public function getJenisKelamin() {
        return $this->jenisKelamin;
    }

    public function setJenisKelamin($jenisKelamin) {
        $this->jenisKelamin = $jenisKelamin;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    // Metode lainnya
}
?>
