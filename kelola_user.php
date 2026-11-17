<?php
require 'auth.php';
require 'config.php';
cekRole('admin'); // Poin 6: Petugas & siswa ditolak mengakses halaman ini

// Tambah User Baru
if (isset($_POST['tambah_user'])) {
    $nama     = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $stmt = $koneksi->prepare("INSERT INTO users (nama, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nama, $username, $password, $role]);
    header("Location: kelola_user.php?status=ditambah");
    exit;
}

// Hapus User
if (isset($_GET['hapus'])) {
    $idHapus = (int) $_GET['hapus'];
    if ($idHapus !== (int) $_SESSION['user_id']) { // Cegah admin menghapus dirinya sendiri
        $stmt = $koneksi->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$idHapus]);
    }
    header("Location: kelola_user.php?status=dihapus");
    exit;
}

// Ambil semua data pengguna
$users = $koneksi->query("SELECT id, nama, username, role FROM users ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Pengguna - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="app-page theme-admin">
<main class="container page-content">
    <div class="page-heading">
        <div>
            <p class="page-eyebrow">PANEL ADMINISTRATOR</p>
            <h1>Kelola pengguna</h1>
        </div>
        <a href="admin.php" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>
    </div>

    <div class="card app-card mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Tambah pengguna baru</h5>
            <form method="POST" class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="col-md-2">
                    <select name="role" class="form-select" required>
                        <option value="siswa">Siswa</option>
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" name="tambah_user" class="btn btn-primary w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card app-card">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Daftar pengguna</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $i => $u): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($u['nama']) ?></td>
                            <td><?= htmlspecialchars($u['username']) ?></td>
                            <td><span class="badge bg-secondary text-uppercase"><?= htmlspecialchars($u['role']) ?></span></td>
                            <td>
                                <?php if ($u['id'] != $_SESSION['user_id']): ?>
                                    <a href="kelola_user.php?hapus=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</a>
                                <?php else: ?>
                                    <span class="text-muted small">Akun Aktif</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>