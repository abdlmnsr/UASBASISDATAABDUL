<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #dee2e6);
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .nav-link {
            font-size: 1.2rem;
            padding: 12px 18px;
            color: #333;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        .nav-link:hover {
            background-color: #adb5bd;
            border-radius: 5px;
            transform: scale(1.05);
        }
        .card-header {
            background: linear-gradient(to right, #343a40, #495057);
            color: white;
            text-align: center;
        }
        .h1, .h2 {
            font-size: x-large;
        }
        i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
   <div class="card">
    <div class="card-header">
        <h1><i class="fas fa-bars"></i> Menu</h1>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a class="nav-link" href="about.php" aria-label="Tentang">
                <i class="fas fa-info-circle"></i> Tentang
            </a>
            <a class="nav-link" href="schedule.php" aria-label="Jadwal Ujian">
                <i class="fas fa-calendar-alt"></i> Jadwal Ujian
            </a>
            <a class="nav-link" href="dashboard_mahasiswa.php" aria-label="Kembali">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </nav>
    </div>
</div>

    <div class="card mt-3">
        <div class="card-header">
            <h2><i class="fas fa-book"></i> Pelajaran</h2>
        </div>
        <div class="card-body">
            <nav class="nav flex-column">
                <a class="nav-link" href="exam.php?subject=matematika" aria-label="matematika">
                    <i class="fas fa-calculator"></i> Matematika
                </a>
                <a class="nav-link" href="exam.php?subject=fisika" aria-label="fisika">
                    <i class="fas fa-atom"></i> Fisika
                </a>
                <a class="nav-link" href="exam.php?subject=kimia" aria-label="kimia">
                    <i class="fas fa-flask"></i> Kimia
                </a>
                <a class="nav-link" href="exam.php?subject=biologi" aria-label="biologi">
                    <i class="fas fa-leaf"></i> Biologi
                </a>
                <a class="nav-link" href="exam.php?subject=sejarah" aria-label="sejarah">
                    <i class="fas fa-landmark"></i> Sejarah
                </a>
                <a class="nav-link" href="exam.php?subject=ekonomi" aria-label="ekonomi">
                    <i class="fas fa-chart-line"></i> Ekonomi
                </a>
                <a class="nav-link" href="exam.php?subject=seni" aria-label="seni">
                    <i class="fas fa-paint-brush"></i> Seni
                </a>
                <a class="nav-link" href="exam.php?subject=olahraga" aria-label="olahraga">
                    <i class="fas fa-futbol"></i> Olahraga
                </a>
            </nav>
        </div>
    </div>
</div>
</body>
</html>