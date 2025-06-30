<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name   = $_POST['name'] ?? ''; // Menggunakan 'name' sesuai dengan kolom di database
    $divisi = $_POST['divisi'] ?? '';
    $id     = $_POST['id'] ?? '';

    
    // Debugging: Cek nilai yang diterima
    var_dump($name); // Tambahkan ini utk lihat dari  $name
    var_dump($divisi); 

    if (empty($name) || empty($divisi)) {
        echo "Semua field harus diisi!";
        exit();
    }
     

    if (!empty($id)) {
        // UPDATE
        $stmt = $conn->prepare("UPDATE pegawai SET name=?, divisi=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $divisi, $id);
        if ($stmt->execute()) {
            header("Location: ../view/kelola_pegawai.php?msg=update");
            exit();
        } else {
            echo "Gagal update data: " . $conn->error;
        }
    } else {
        // INSERT
        $stmt = $conn->prepare("INSERT INTO pegawai (name, divisi) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $divisi);
        if ($stmt->execute()) {
            header("Location: ../view/kelola_pegawai.php?msg=insert");
            exit();
        } else {
            echo "Gagal tambah data: " . $conn->error;
        }
    }
    $stmt->close();
}
?>