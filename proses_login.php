<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Ambil data user berdasarkan username
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $koneksi->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifikasi password dengan password_verify
if ($user && password_verify($password, $user['password'])) {
    
    // Regenerasi session ID untuk keamanan
    session_regenerate_id(true);
    
    // Simpan data ke session
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['nama']     = $user['nama'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    // Arahkan ke dashboard.php
    header("Location: dashboard.php");
    exit;
} else {
    // Jika gagal, kembalikan ke index.php dengan parameter error=1
    header("Location: index.php?error=1");
    exit;
}
?>