<?php
session_start(); // Memulai sesi

// Hapus semua sesi
$_SESSION = array(); // Mengosongkan array sesi

// Hapus cookie sesi jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Hentikan sesi
session_destroy(); // Menghancurkan sesi

// Alihkan ke halaman login
header("Location: login.php"); // Ganti dengan nama file login Anda
exit();
?>