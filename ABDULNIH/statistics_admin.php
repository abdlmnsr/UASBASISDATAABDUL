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

// Ambil data ujian terbaru
$query = "SELECT 
            m.nama AS nama_mahasiswa,
            r.matematika, r.fisika, r.kimia, r.biologi, 
            r.sejarah, r.ekonomi, r.seni, r.olahraga, 
            r.submitted_at
          FROM results r
          JOIN mhs m ON r.username = m.username
          ORDER BY r.submitted_at DESC";

$result = $conn->query($query);

// Simpan data untuk Chart.js
$mahasiswa = [];
$nilai = [];

while ($row = $result->fetch_assoc()) {
    $mahasiswa[] = $row["nama_mahasiswa"];
    $nilai[] = [
        "matematika" => $row["matematika"],
        "fisika" => $row["fisika"],
        "kimia" => $row["kimia"],
        "biologi" => $row["biologi"],
        "sejarah" => $row["sejarah"],
        "ekonomi" => $row["ekonomi"],
        "seni" => $row["seni"],
        "olahraga" => $row["olahraga"]
    ];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Ujian - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center">📊 Statistik Ujian - Admin</h2>

        <canvas id="examChart"></canvas>

        <script>
            var ctx = document.getElementById('examChart').getContext('2d');
            var examChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($mahasiswa); ?>,
                    datasets: [
                        { label: 'Matematika', data: <?php echo json_encode(array_column($nilai, 'matematika')); ?>, backgroundColor: 'rgba(255, 99, 132, 0.6)' },
                        { label: 'Fisika', data: <?php echo json_encode(array_column($nilai, 'fisika')); ?>, backgroundColor: 'rgba(54, 162, 235, 0.6)' },
                        { label: 'Kimia', data: <?php echo json_encode(array_column($nilai, 'kimia')); ?>, backgroundColor: 'rgba(255, 206, 86, 0.6)' },
                        { label: 'Biologi', data: <?php echo json_encode(array_column($nilai, 'biologi')); ?>, backgroundColor: 'rgba(75, 192, 192, 0.6)' },
                        { label: 'Sejarah', data: <?php echo json_encode(array_column($nilai, 'sejarah')); ?>, backgroundColor: 'rgba(153, 102, 255, 0.6)' },
                        { label: 'Ekonomi', data: <?php echo json_encode(array_column($nilai, 'ekonomi')); ?>, backgroundColor: 'rgba(255, 159, 64, 0.6)' },
                        { label: 'Seni', data: <?php echo json_encode(array_column($nilai, 'seni')); ?>, backgroundColor: 'rgba(128, 128, 128, 0.6)' },
                        { label: 'Olahraga', data: <?php echo json_encode(array_column($nilai, 'olahraga')); ?>, backgroundColor: 'rgba(0, 204, 102, 0.6)' }
                    ]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        </script>

        <div class="text-center mt-4">
            <a class="btn btn-secondary" href="dashboard_admin.php">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

</body>
</html>