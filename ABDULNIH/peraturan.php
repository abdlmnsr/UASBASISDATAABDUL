<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peraturan Ujian</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center text-danger"><i class="fas fa-exclamation-circle"></i> Peraturan Ujian Online</h2>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fas fa-clock"></i> Ujian harus dimulai dan diselesaikan sesuai jadwal.</li>
            <li class="list-group-item"><i class="fas fa-user-lock"></i> Peserta harus login dengan akun resmi sebelum memulai ujian.</li>
            <li class="list-group-item"><i class="fas fa-ban"></i> Dilarang menggunakan sumber eksternal atau bekerja sama dengan orang lain selama ujian.</li>
            <li class="list-group-item"><i class="fas fa-exchange-alt"></i> Jawaban tidak dapat diubah setelah ujian berakhir.</li>
            <li class="list-group-item"><i class="fas fa-file-alt"></i> Hasil ujian akan diumumkan sesuai kebijakan akademik.</li>
            <li class="list-group-item"><i class="fas fa-search"></i> Sistem dapat mendeteksi aktivitas mencurigakan, termasuk perpindahan tab atau penggunaan perangkat lain.</li>
            <li class="list-group-item"><i class="fas fa-exclamation-triangle"></i> Pelanggaran berat dapat menyebabkan diskualifikasi ujian.</li>
        </ul>

        <div class="text-center mt-4">
            <a class="btn btn-secondary" href="dashboard_mahasiswa.php">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>