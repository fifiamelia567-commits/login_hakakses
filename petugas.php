<?php
require 'auth.php';
cekRole('petugas');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="app-page theme-petugas">
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm app-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="petugas.php">Sistem Sekolah | Petugas</a>
        <div class="navbar-nav ms-auto gap-2">
            <a class="nav-link active" href="petugas.php">Dashboard</a>
            <a class="nav-link" href="profil.php">Profil Saya</a>
            <a href="logout.php" class="btn btn-light btn-sm ms-2 d-flex align-items-center">Logout</a>
        </div>
    </div>
</nav>

<main class="container page-content">
    <div class="alert welcome-banner">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['nama']) ?></strong> (Role: Petugas)
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card feature-card">
                <div class="card-body">
                    <div class="feature-icon" aria-hidden="true">01</div>
                    <h4 class="card-title fw-bold">Ruang kerja petugas</h4>
                    <p class="card-text text-muted">Anda memiliki akses untuk membantu mengelola kebutuhan operasional sekolah.</p>
                    <a href="profil.php" class="btn btn-success btn-sm">Kelola Profil & Password</a>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>