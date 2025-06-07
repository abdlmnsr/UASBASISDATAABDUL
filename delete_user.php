<?php
session_start();

$servername = "localhost"; // atau alamat server database Anda
$username = "root"; // atau username database Anda
$password = ""; // atau password database Anda
$dbname = "db_connection"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID pengguna dari URL
$id = $_GET['id'];

// Hapus pengguna dari database
$delete_sql = "DELETE FROM mhs WHERE id = ?";
$stmt = $conn->prepare($delete_sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect ke halaman kelola pengguna
header("Location: manage_users.php");
exit();
?>