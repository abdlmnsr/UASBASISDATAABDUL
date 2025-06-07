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

// Ambil ID pengguna dari URL dan validasi
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data pengguna untuk diedit
$sql = "SELECT * FROM mhs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Ambil data program studi dan fakultas untuk dropdown
$prodi_result = $conn->query("SELECT id, nama_prodi FROM tb_prodi");
$fakultas_result = $conn->query("SELECT id, nama_fakultas FROM tb_fakultas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $prodi_id = $_POST['prodi_id'];
    $fakultas_id = $_POST['fakultas_id'];

    // Update data pengguna
    $update_sql = "UPDATE mhs SET nama = ?, prodi_id = ?, fakultas_id = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("siii", $nama, $prodi_id, $fakultas_id, $id);
    
    if ($update_stmt->execute()) {
        header("Location: manage_users.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Cek jika pengguna tidak ditemukan
if (!$user) {
    die("Pengguna tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div class="card shadow p-4">
                <h2 class="text-center text-primary">Edit Pengguna</h2>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Prodi:</label>
                        <select name="prodi_id" class="form-select" required>
                            <!-- Opsi Prodi -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fakultas:</label>
                        <select name="fakultas_id" class="form-select" required>
                            <!-- Opsi Fakultas -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
                <div class="text-center mt-3">
                    <a href="manage_users.php" class="btn btn-secondary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
        <div class="text-center mt-3">
            <a href="manage_users.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>