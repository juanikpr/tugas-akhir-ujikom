<?php 
session_start(); 
include("../controller/koneksi.php");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Kelola Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- navbar -->
        <nav class="col-md-2 d-md-block bg-dark sidebar text-white vh-100 position-fixed p-3">
            <div class="text-center mb-4">
                <img src="../assets/img/jnlogo.jpg" alt="Logo Kantor" class="img-fluid" width="100">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link active bg-primary text-white rounded" href="kelola_pegawai.php">Kelola Pegawai</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="../view/logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto col-lg-10 px-md-5 ms-auto">
            <div class="pt-4 pb-2 mb-4 border-bottom">
                <h1 class="h3">Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>!</h1>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Kelola Pegawai</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data-pegawai">
                        <!-- Data pegawai dari JS/AJAX -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!--insert Modal Tambah --> 
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" action="../controller/insert.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Tambahkan Data Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <select class="form-select" name="divisi" required>
                <option disabled selected>Pilih divisi</option>
                <option value="DIREKTUR UTAMA">DIREKTUR UTAMA</option>
                <option value="HRD">HRD</option>
                <option value="Keuangan">Keuangan</option>
                <option value="IT">IT</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit (struktur sama, isian akan diisi via insert) -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" action="../controller/insert.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="editIdPegawai" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="name" id="editNamaPegawai" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <select class="form-select" name="divisi" id="editDivisiPegawai" required>
                <option disabled selected>Pilih divisi</option>
                <option value="DIREKTUR UTAMA">DIREKTUR UTAMA</option>
                <option value="HRD">HRD</option>
                <option value="Keuangan">Keuangan</option>
                <option value="IT">IT</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>


<script src="../assets/js/kelola_pegawai.js" defer></script>

<!-- Bootstrap & jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS AJAX (memuat data pegawai) -->
<script src="../assets/js/getDataPegawai.js" defer></script>
<script src="../assets/js/fungsional.js" defer></script>

</body>
</html>
