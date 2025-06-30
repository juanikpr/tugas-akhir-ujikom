<?php
session_start(); // mulai sesi utk nyimpan informasi pengguna
include("../controller/koneksi.php"); // Pastikan koneksi ke database sudah benar

//  login user
if (!isset($_SESSION['username'])) { // mariksa apakh sesi username aya
    $_SESSION['username'] = "admin"; // contoh default user
}

// Menghitung jumlah pegawai yang ada didata
$queryPegawai = "SELECT COUNT(*) as total_pegawai FROM pegawai"; // Query untuk ngitung 
$resultPegawai = $conn->query($queryPegawai); // Menjalankan query
$rowPegawai = $resultPegawai->fetch_assoc(); //ngambil hasil quey
$totalPegawai = $rowPegawai['total_pegawai']; //nyimpen total pegawai ke var

// Menghitung jumlah divisi
$queryDivisi = "SELECT COUNT(DISTINCT divisi) as total_divisi FROM pegawai";
$resultDivisi = $conn->query($queryDivisi);
$rowDivisi = $resultDivisi->fetch_assoc();
$totalDivisi = $rowDivisi['total_divisi'];
?>

