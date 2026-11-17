<?php
require 'auth.php';
require 'config.php';
cekLogin();

$pesan = "";
$tipeAlert = "";

// Proses Ubah Nama
if (isset($_POST['update_nama'])) {
    $namaBaru = trim($_POST['nama']);
    if (!empty($namaBaru)) {
        $stmt = $koneksi->prepare("UPDATE users SET nama = ? WHERE id = ?");
        $stmt->execute([$namaBaru, $_SESSION['user_id']]);
        $_SESSION['nama'] = $namaBaru;
        $pesan = "Nama lengkap berhasil diperbarui!";
        $tipeAlert = "success";
    }
}

// Proses Ubah Password
if (isset($_POST['update_password'])) {
    $passLama = $_POST['password_lama'];
    $passBaru = $_POST['password_baru'];

    $stmt = $koneksi->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($passLama, $user['password'])) {
        $hashBaru = password_hash($passBaru, PASSWORD_DEFAULT);
        $update = $koneksi->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update->execute([$hashBaru, $_SESSION['user_id']]);
        $pesan = "Password berhasil diubah!";
        $tipeAlert = "success";
    } else {
        $pesan = "Password lama tidak sesuai!";
        $tipeAlert = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="app-page">
<main class="container page-content">
    <div class="page-heading">
        <div>
            <p class="page-eyebrow">PENGATURAN AKUN</p>
            <h1>Profil pengguna</h1>
        </div>
        <a href="dashboard.php" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>
    </div>

    <?php if ($pesan): ?>
        <div class="alert alert-<?= $tipeAlert ?>"><?= $pesan ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card app-card h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Informasi akun</h5>
                    <p class="mb-1"><strong>Username:</strong> <?= htmlspecialchars($_SESSION['username']) ?></p>
                    <p class="mb-3"><strong>Role:</strong> <span class="badge bg-info text-dark text-uppercase"><?= htmlspecialchars($_SESSION['role']) ?></span></p>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($_SESSION['nama']) ?>" required>
                        </div>
                        <button type="submit" name="update_nama" class="btn btn-primary btn-sm">Simpan Nama</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card app-card h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Keamanan akun</h5>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                        </div>
                        <button type="submit" name="update_password" class="btn btn-warning btn-sm fw-semibold">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>