<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_connection";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Simpan jawaban ujian ke database jika ada data POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jawaban'])) {
    echo "<h1>Hasil Ujian</h1>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>No</th><th>Soal ID</th><th>Jawaban Anda</th></tr>";

    $no = 1;
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        echo "<tr><td>{$no}</td><td>{$soal_id}</td><td>{$jawaban}</td></tr>";
        $no++;

        // Simpan jawaban ke database
        $stmt = $conn->prepare("INSERT INTO results (username, soal_id, jawaban) VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE jawaban = VALUES(jawaban)");
        $stmt->bind_param("sis", $_SESSION['username'], $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }

    echo "</table>";
} else {
    echo "";
}

// Definisi mata pelajaran
$subjects = ['matematika', 'fisika', 'kimia', 'biologi', 'sejarah', 'ekonomi', 'seni', 'olahraga'];
$scores = [];

// Ambil skor dari sesi
foreach ($subjects as $subject) {
    $scores[$subject] = $_SESSION[$subject] ?? 0;
}

// Simpan hasil ujian ke database
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Cek apakah data sudah ada
    $stmt = $conn->prepare("SELECT * FROM results WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update jika sudah ada
        $update_stmt = $conn->prepare("UPDATE results SET 
            matematika = ?, fisika = ?, kimia = ?, biologi = ?, 
            sejarah = ?, ekonomi = ?, seni = ?, olahraga = ? 
            WHERE username = ?");
        $update_stmt->bind_param("iiiiiiiis", $scores['matematika'], $scores['fisika'], 
            $scores['kimia'], $scores['biologi'], $scores['sejarah'], 
            $scores['ekonomi'], $scores['seni'], $scores['olahraga'], $username);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // Insert jika belum ada
        $insert_stmt = $conn->prepare("INSERT INTO results (username, matematika, fisika, kimia, biologi, sejarah, ekonomi, seni, olahraga) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_stmt->bind_param("siiiiiii", $username, 
            $scores['matematika'], $scores['fisika'], $scores['kimia'], 
            $scores['biologi'], $scores['sejarah'], $scores['ekonomi'], 
            $scores['seni'], $scores['olahraga']);
        $insert_stmt->execute();
        $insert_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Hasil Ujian Anda</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pelajaran</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scores as $subject => $score): ?>
                    <tr>
                        <td><?= ucfirst($subject); ?></td>
                        <td><?= $score; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="menu.php" class="btn btn-primary">Kembali ke Menu</a>
    </div>
</body>
</html>