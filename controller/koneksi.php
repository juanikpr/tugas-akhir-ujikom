<?php

$host = "localhost";
//alamat host database, biasanya 'localhost'
$username = "root";
//nama pengguna database 
$password = "";
//kata sandi database, kosong jika eweuh
$database ="pegawai";
//nama database yang digunakan

//membuat objek koneksi baru ke database menggunakan MySQLi
$conn = new mysqli($host, $username, $password, $database);

//memeriksa apakah koneksi ke database berhasil atau gagal
if ($conn-> connect_error) {
    //jika terjadi kesalahan saat koneksi, tampiljkan pesan kesalahan dan hentikan eksekusi script
    die("koneksi ke database gagal : " . $conn->connect_error);
}
?>