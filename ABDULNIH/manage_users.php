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

$sql = "SELECT m.id, m.nim, m.username, m.nama, p.nama_prodi, f.nama_fakultas 
        FROM mhs m
        JOIN tb_prodi p ON m.prodi_id = p.id
        JOIN tb_fakultas f ON p.fakultas_id = f.id
        ORDER BY m.id ASC";

$result = $conn->query($sql);

// Hitung jumlah mahasiswa
$count_sql = "SELECT COUNT(*) AS total_mahasiswa FROM mhs";
$count_result = $conn->query($count_sql);
$row_count = $count_result->fetch_assoc();
$total_mahasiswa = $row_count['total_mahasiswa'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="text-center text-primary">Kelola Pengguna</h1>
        <p class="text-center fs-5 fw-bold">Jumlah Mahasiswa: <span class="badge bg-success"><?php echo $total_mahasiswa; ?></span></p>

        <div class="d-flex justify-content-between mb-3">
            <a href="dashboard_admin.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="add_mahasiswa.php" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>

        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>" . htmlspecialchars($row['nama']) . "</td>
                                <td>" . htmlspecialchars($row['nim']) . "</td>
                                <td>" . htmlspecialchars($row['nama_prodi']) . "</td>
                                <td>" . htmlspecialchars($row['nama_fakultas']) . "</td>
                                <td>
                                    <a href='edit_user.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_user.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center text-danger'>Tidak ada pengguna.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>