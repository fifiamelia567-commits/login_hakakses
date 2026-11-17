<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#23386f">
    <title>Masuk | Portal Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="login-page">
<main class="login-layout">
    <section class="login-promo">
        <div class="login-brand">
            <span class="brand-symbol">S</span>
            <strong>Portal Sekolah</strong>
        </div>

        <div class="login-promo-copy">
            <p class="login-eyebrow">RUANG DIGITAL SEKOLAH</p>
            <h1>Semua akses sekolah, dalam satu tempat.</h1>
            <p>Kelola informasi dan aktivitas sekolah dengan mudah melalui portal yang aman dan nyaman digunakan.</p>
        </div>

        <div class="login-status"><span></span>Portal siap digunakan untuk komunitas sekolah</div>
    </section>

    <section class="login-panel">
        <div class="login-card">
            <span class="brand-symbol">S</span>
            <h2>Selamat datang</h2>
            <p class="login-description">Masuk untuk melanjutkan ke akun Portal Sekolah Anda.</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger py-2" role="alert">Username atau password salah. Silakan coba lagi.</div>
            <?php endif; ?>

            <form action="proses_login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" autocomplete="username" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" autocomplete="current-password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-semibold">Masuk ke akun <span aria-hidden="true">&rarr;</span></button>
            </form>
            <p class="login-note">Gunakan akun yang telah diberikan oleh administrator sekolah.</p>
        </div>
    </section>
</main>
</body>
</html>