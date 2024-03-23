<?php

namespace App;

// Kelas Database digunakan untuk mengelola koneksi dan interaksi dengan database MySQL.
class Database {
    private $host; // Variabel untuk menyimpan alamat host database.
    private $username; // Variabel untuk menyimpan nama pengguna database.
    private $password; // Variabel untuk menyimpan kata sandi database.
    private $database; // Variabel untuk menyimpan nama database.
    private $connection; // Variabel untuk menyimpan objek koneksi database.

    // Konstruktor kelas, digunakan untuk menginisialisasi nilai host, username, password, dan database.
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    // Metode untuk melakukan koneksi ke database MySQL.
    public function connect() {
        // Membuat objek koneksi baru menggunakan mysqli dengan parameter yang telah ditentukan.
        $this->connection = new \mysqli($this->host, $this->username, 
        // Memeriksa apakah koneksi berhasil, jika tidak, program akan berhenti dan menampilkan pesan kesalahan.
        $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
        // Mengembalikan objek koneksi.
        return $this->connection;
    }

    // Metode untuk menutup koneksi database.
    public function close() {
        $this->connection->close();
    }

    // Metode untuk mendapatkan objek koneksi database.
    public function getConnection() {
        return $this->connection;
    }
}
