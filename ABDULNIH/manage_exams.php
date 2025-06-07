<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connection";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk melihat status ujian mahasiswa
$query = "SELECT m.id, m.nama, m.nim, r.submitted_at, 
                 CASE WHEN r.submitted_at IS NULL THEN 'Belum Mengerjakan' ELSE 'Sudah Mengerjakan' END AS status
          FROM mhs m
          LEFT JOIN results r ON m.username = r.username
          ORDER BY status DESC, r.submitted_at DESC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ujian - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary">📌 Status Ujian Mahasiswa</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark text-white">
                <tr>
                    <th>ID Mahasiswa</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Status Ujian</th>
                    <th>Waktu Submit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $badge = ($row['status'] == 'Sudah Mengerjakan') ? 'badge bg-success' : 'badge bg-danger';
                    $submitted_at = ($row['submitted_at'] !== NULL) ? $row['submitted_at'] : '-';
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['nim']}</td>
                            <td><span class='$badge'>{$row['status']}</span></td>
                            <td>{$submitted_at}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
            <a href="dashboard_admin.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>