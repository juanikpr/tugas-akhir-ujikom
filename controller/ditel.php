<?php
session_start();
include("../controller/koneksi.php"); // Pastikan jalur ini benar

// Cek apa ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan statement untuk ngambil data pegawai berdasarkan ID
    $stmt = $conn->prepare("SELECT name, divisi FROM pegawai WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id); // ngikat parameter ID sebagai integer
        $stmt->execute(); //menjalankan
        $result = $stmt->get_result(); // ngambil hasil query

        // Cek apa pegawai ditemukan
        if ($result->num_rows > 0) {
            // Ambil data pegawai
            $pegawai = $result->fetch_assoc();
        } else {
            echo "Pegawai tidak ditemukan.";
            exit();
        }
    } else {
        echo "Gagal menyiapkan statement: " . $conn->error;
        exit();
    }
} else {
    echo "ID pegawai tidak diberikan.";
    exit();
}
?>