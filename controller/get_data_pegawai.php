<?php
session_start();
include("koneksi.php"); // file koneksi saya

header('Content-Type: application/json'); // ngatur header agar output berupa JSON

// Ambil data dari tabel pegawai
$sql = "SELECT * FROM pegawai"; // utk ngambilsemua data pegawai
$result = $conn->query($sql); //menjalankan
$data = array(); //utk nyimpe data pegawai

// Cek apakah ada data
if ($result->num_rows > 0) { //meriksa ada data hasil dari query
    // Output data setiap baris
    while($row = $result->fetch_assoc()) { //ngambil data perbarisnya
        $data[] = $row; // nyimpan data ke array
    }
} else {
    $data = array(); // Tidak ada data,maka aray kosong
}

// ngeluarin data dlm format JSON
echo json_encode($data);

// Tutup koneksi ke database
$conn->close();
?>