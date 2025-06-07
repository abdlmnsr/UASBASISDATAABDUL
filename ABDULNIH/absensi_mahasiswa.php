
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

// Proses penyimpanan absensi jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mhs_id = intval($_POST['mhs_id']);
    $status = $_POST['status'];
    $tanggal = date('Y-m-d');
    $hari = date('N'); // Mendapatkan hari dalam format angka (1 = Senin, ..., 7 = Minggu)

    if ($hari >= 1 && $hari <= 5) { // Hanya Senin - Jumat
        if ($mhs_id > 0 && in_array($status, ['Hadir', 'Alpha', 'Izin', 'Sakit'])) {
            $query = "INSERT INTO absensi_mhs (mhs_id, tanggal, status) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iss", $mhs_id, $tanggal, $status);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Absensi berhasil disimpan!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Gagal menyimpan absensi.</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-warning text-center'>Data tidak valid!</div>";
        }
    } else {
        echo "<div class='alert alert-warning text-center'>Absensi hanya bisa dilakukan pada hari kerja (Senin-Jumat).</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4"><i class="fas fa-user-check"></i> Absensi Mahasiswa (Senin-Jumat)</h2>
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
                <label for="status" class="form-label"><i class="fas fa-calendar-check"></i> Status Kehadiran:</label>
                <select name="status" class="form-control" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Simpan Absensi</button>
        </form>
    </div>

    <div class="card p-4 mt-4 shadow">
        <h3 class="text-center"><i class="fas fa-list"></i> Rekap Absensi Mahasiswa</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal</th>
                        <th>Status Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT mhs.nama, absensi_mhs.tanggal, absensi_mhs.status FROM absensi_mhs INNER JOIN mhs ON absensi_mhs.mhs_id = mhs.id ORDER BY absensi_mhs.tanggal DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama']}</td>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['status']}</td>
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