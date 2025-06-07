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

// Ambil statistik ujian terbaru
$query = "SELECT 
            m.nama AS nama_mahasiswa,
            r.matematika, r.fisika, r.kimia, r.biologi, 
            r.sejarah, r.ekonomi, r.seni, r.olahraga, 
            r.submitted_at, 
            CASE 
                WHEN (r.matematika + r.fisika + r.kimia + r.biologi + 
                      r.sejarah + r.ekonomi + r.seni + r.olahraga) / 8 >= 85 THEN 'A'
                WHEN (r.matematika + r.fisika + r.kimia + r.biologi + 
                      r.sejarah + r.ekonomi + r.seni + r.olahraga) / 8 >= 70 THEN 'B'
                WHEN (r.matematika + r.fisika + r.kimia + r.biologi + 
                      r.sejarah + r.ekonomi + r.seni + r.olahraga) / 8 >= 60 THEN 'C'
                WHEN (r.matematika + r.fisika + r.kimia + r.biologi + 
                      r.sejarah + r.ekonomi + r.seni + r.olahraga) / 8 >= 50 THEN 'D'
                ELSE 'E'
            END AS grade
          FROM results r
          JOIN mhs m ON r.username = m.username
          ORDER BY r.submitted_at DESC";

$result = $conn->query($query);

// Periksa apakah query berhasil dijalankan
if (!$result) {
    die("Error pada query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Ujian - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">📊 Statistik Ujian - Admin</h2>
        <a href="dashboard_dosen.php" class="back-button">Kembali ke Dashboard</a>

        <table class="table table-bordered table-striped mt-3">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Matematika</th>
                    <th>Fisika</th>
                    <th>Kimia</th>
                    <th>Biologi</th>
                    <th>Sejarah</th>
                    <th>Ekonomi</th>
                    <th>Seni</th>
                    <th>Olahraga</th>
                    <th>Grade</th>
                    <th>Tanggal Submit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $gradeColor = ($row["grade"] == 'A') ? 'text-success' :
                                      (($row["grade"] == 'B') ? 'text-primary' :
                                      (($row["grade"] == 'C') ? 'text-warning' :
                                      (($row["grade"] == 'D') ? 'text-danger' : 'text-muted')));

                        echo "<tr>";
                        echo "<td>" . $row["nama_mahasiswa"] . "</td>";
                        echo "<td>" . $row["matematika"] . "</td>";
                        echo "<td>" . $row["fisika"] . "</td>";
                        echo "<td>" . $row["kimia"] . "</td>";
                        echo "<td>" . $row["biologi"] . "</td>";
                        echo "<td>" . $row["sejarah"] . "</td>";
                        echo "<td>" . $row["ekonomi"] . "</td>";
                        echo "<td>" . $row["seni"] . "</td>";
                        echo "<td>" . $row["olahraga"] . "</td>";
                        echo "<td class='$gradeColor'>" . $row["grade"] . "</td>";
                        echo "<td>" . $row["submitted_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>Belum ada data ujian</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>