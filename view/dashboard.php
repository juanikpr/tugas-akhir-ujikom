<?php include("../controller/dash.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <a class="nav-link active bg-primary text-white rounded" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="kelola_pegawai.php">Kelola Pegawai</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="../view/logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Konten utama -->
        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="mb-4">Dashboard</h2>
            <div class="alert alert-success">
                Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>!
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card text-bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Pegawai</h5>
                            <p class="card-text fs-4"><?php echo $totalPegawai; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Divisi</h5>
                            <p class="card-text fs-4"><?php echo $totalDivisi; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

