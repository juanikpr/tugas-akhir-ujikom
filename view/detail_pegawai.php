<?php include("../controller/ditel.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Ganti dengan path yang sesuai -->
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Detail Pegawai</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo isset($pegawai) ? htmlspecialchars($pegawai['name']) : 'Data tidak tersedia'; ?></td>
                    </tr>
                    <tr>
                        <th>Divisi</th>
                        <td><?php echo isset($pegawai) ? htmlspecialchars($pegawai['divisi']) : 'Data tidak tersedia'; ?></td>
                    </tr>
                </table>
                <a href="../view/kelola_pegawai.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
//meriksa apa ada statment yg udh di siapkan
if (isset($stmt)) {
    $stmt->close(); // nutup statement jika udh ada
}
$conn->close(); // nutup koneksi ke database
?>