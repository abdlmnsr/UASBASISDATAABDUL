<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connection";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = ""; // Variabel untuk menampilkan pesan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $prodi_id = $_POST["prodi_id"];
    $fakultas_id = $_POST["fakultas_id"];

    // Validasi agar tidak ada input kosong
    if (!empty($nim) && !empty($username) && !empty($nama) && !empty($prodi_id) && !empty($fakultas_id)) {
        $sql = "INSERT INTO mhs (nim, username, nama, prodi_id, fakultas_id) VALUES ('$nim', '$username', '$nama', '$prodi_id', '$fakultas_id')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='alert alert-success'>Mahasiswa berhasil ditambahkan!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>Semua kolom harus diisi!</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center text-primary">Tambah Mahasiswa</h2>
        <?php echo $message; ?>
        <form action="add_mahasiswa.php" method="post">
            <div class="mb-3">
                <label class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Prodi ID:</label>
                <input type="text" name="prodi_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fakultas ID:</label>
                <input type="text" name="fakultas_id" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Tambah Mahasiswa</button>
        </form>
        <div class="text-center mt-3">
            <a href="manage_users.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>