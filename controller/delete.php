<?php
 session_start(); // mulai sesi utk nyimpan informasi pengguna
 include("koneksi.php"); // Pastikan koneksi ke database sudah benar

 // meriksa apkh ada data POST dengan kunci 'id'
 if (isset($_POST['id'])){ //ngambil ID pegawai yg akan dihapus dari data POST
    $id = $_POST['id'];

    //nyiapin statement sql utk ngapus data pegawai sesuai id nya
    $stmt = $conn->prepare ("DELETE FROM pegawai WHERE id=?"); 
    $stmt->bind_param("i", $id);
    // ngikat parameter ID ke statement (tipe 'i' untuk integer)
    
    // Menjalankan statement utk ngapus data
    if ($stmt->execute()){
        echo "Data Berhasil Dihapus";
    }
    else{
        echo"data gagal dihapus:" .$conn->error;
    }
    
 }
?>