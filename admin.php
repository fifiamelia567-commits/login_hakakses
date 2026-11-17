<?php
require 'auth.php';
cekRole('admin');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="app-page theme-admin">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm app-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="admin.php">Sistem Sekolah | Admin</a>
        <div class="navbar-nav ms-auto gap-2">
            <a class="nav-link active" href="admin.php">Dashboard</a>
            <a class="nav-link" href="kelola_user.php">Kelola Pengguna</a>
            <a class="nav-link" href="profil.php">Profil Saya</a>
            <a href="logout.php" class="btn btn-light btn-sm ms-2 d-flex align-items-center">Logout</a>
        </div>
    </div>
</nav>

<main class="container page-content">
    <div class="alert welcome-banner">
        Selamat datang kembali, <strong><?= htmlspecialchars($_SESSION['nama']) ?></strong> (Role: Admin)
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body">
                    <div class="feature-icon" aria-hidden="true">01</div>
                    <h5 class="card-title fw-bold">Manajemen Pengguna</h5>
                    <p class="card-text text-muted">Tambah, ubah role, atau hapus akun Admin, Petugas, dan Siswa.</p>
                    <a href="kelola_user.php" class="btn btn-primary btn-sm">Buka Daftar Pengguna</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body">
                    <div class="feature-icon" aria-hidden="true">02</div>
                    <h5 class="card-title fw-bold">Pengaturan Akun</h5>
                    <p class="card-text text-muted">Perbarui nama lengkap dan kata sandi akun Anda.</p>
                    <a href="profil.php" class="btn btn-outline-primary btn-sm">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>