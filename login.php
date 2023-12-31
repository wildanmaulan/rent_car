<?php

// Penerimaan data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi informasi login (contoh sederhana, hindari penyimpanan kata sandi seperti ini di produksi)
$valid_username = '123';
$valid_password = '111';

if ($username == $valid_username && $password == $valid_password) {
    // Informasi login benar, mulai sesi
    session_start();

    // Tetapkan sesi pengguna
    $_SESSION['username'] = $username;

    // Redirect ke halaman beranda atau halaman setelah login
    header('Location: mobil');
    exit();
} else {
    // Informasi login salah, kembali ke formulir login
    header('Location: index.php?error=1');
exit();
}