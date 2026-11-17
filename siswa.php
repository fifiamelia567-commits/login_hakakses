<?php
require 'auth.php';
cekRole('siswa');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="app-page theme-siswa">
<nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm app-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="siswa.php">Sistem Sekolah | Siswa</a>
        <div class="navbar-nav ms-auto gap-2">
            <a class="nav-link active" href="siswa.php">Dashboard</a>
            <a class="nav-link" href="profil.php">Profil Saya</a>
            <a href="logout.php" class="btn btn-dark btn-sm ms-2 d-flex align-items-center">Logout</a>
        </div>
    </div>
</nav>

<main class="container page-content">
    <div class="alert welcome-banner">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['nama']) ?></strong> (Role: Siswa)
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card feature-card">
                <div class="card-body">
                    <div class="feature-icon" aria-hidden="true">01</div>
                    <h4 class="card-title fw-bold">Ruang informasi siswa</h4>
                    <p class="card-text text-muted">Lihat informasi sekolah dan perbarui profil pribadi Anda dengan mudah.</p>
                    <a href="profil.php" class="btn btn-warning btn-sm fw-semibold">Kelola Profil & Password</a>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>