<?php
require 'config.php';

$data = [
    ['Administrator', 'admin', 'admin123', 'admin'],
    ['Petugas Sekolah', 'petugas', 'petugas123', 'petugas'],
    ['Siswa SMK', 'siswa', 'siswa123', 'siswa']
];

$cariUser = $koneksi->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
$buatUser = $koneksi->prepare("INSERT INTO users (nama, username, password, role) VALUES (?, ?, ?, ?)");
$perbaruiUser = $koneksi->prepare("UPDATE users SET nama = ?, password = ?, role = ? WHERE username = ?");

foreach ($data as $u) {
    $passwordHash = password_hash($u[2], PASSWORD_DEFAULT);
    $cariUser->execute([$u[1]]);

    if ($cariUser->fetch(PDO::FETCH_ASSOC)) {
        $perbaruiUser->execute([$u[0], $passwordHash, $u[3], $u[1]]);
    } else {
        $buatUser->execute([$u[0], $u[1], $passwordHash, $u[3]]);
    }
}

echo "Akun pengguna berhasil disiapkan! Segera hapus file ini.";
?>