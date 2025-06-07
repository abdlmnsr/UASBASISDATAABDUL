<?php
// Koneksi ke database langsung dalam file ini
$servername = "localhost";
$username = "root"; // Sesuaikan dengan pengguna database Anda
$password = ""; // Sesuaikan jika ada password
$dbname = "db_connection";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<div class='alert alert-danger text-center'>Koneksi gagal: " . $conn->connect_error . "</div>");
}

// Proses penyimpanan nilai jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mhs_id = intval($_POST['mhs_id']);
    $nilai = intval($_POST['nilai']);

    if ($mhs_id > 0 && $nilai >= 0) {
        $query = "INSERT INTO nilai (mhs_id, nilai) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $mhs_id, $nilai);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>Nilai berhasil disimpan!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Gagal menyimpan nilai.</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-warning text-center'>Data tidak valid!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4"><i class="fas fa-graduation-cap"></i> Input Nilai Mahasiswa</h2>
    <a class="btn btn-secondary mb-3" href="dashboard_dosen.php"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>

    <div class="card p-4 shadow">
        <form method="POST">
            <div class="mb-3">
                <label for="mhs_id" class="form-label"><i class="fas fa-user"></i> Pilih Mahasiswa:</label>
                <select name="mhs_id" class="form-control" required>
                    <?php
                    $result = $conn->query("SELECT id, nama FROM mhs");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label"><i class="fas fa-star"></i> Masukkan Nilai:</label>
                <input type="number" name="nilai" class="form-control" required min="0">
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Simpan Nilai</button>
        </form>
    </div>

    <div class="card p-4 mt-4 shadow">
        <h3 class="text-center"><i class="fas fa-list"></i> Daftar Nilai Mahasiswa</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT mhs.nama, nilai.nilai FROM nilai INNER JOIN mhs ON nilai.mhs_id = mhs.id ORDER BY nilai.nilai DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama']}</td>
                                <td>{$row['nilai']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
$conn->close();
?>

</body>
</html>