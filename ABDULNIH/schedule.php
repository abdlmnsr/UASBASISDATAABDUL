<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ujian</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #dee2e6);
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .schedule-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            background: #007bff;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            font-size: 18px;
            transition: background 0.3s, transform 0.2s;
        }

        ul li:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .nav-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #333;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background 0.3s, transform 0.2s;
        }

        .nav-link:hover {
            background: #555;
            transform: scale(1.1);
        }

        .nav-link i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="schedule-container">
        <h1><i class="fas fa-calendar-alt"></i> Jadwal Ujian</h1>
        <ul>
            <li><i class="fas fa-calculator"></i> Ujian Matematika: 10 Mei 2025</li>
            <li><i class="fas fa-atom"></i> Ujian Fisika: 11 Mei 2025</li>
            <li><i class="fas fa-calculator"></i> Ujian Kimia: 12 Mei 2025</li>
            <li><i class="fas fa-atom"></i> Ujian Biologi: 13 Mei 2025</li>
            <li><i class="fas fa-calculator"></i> Ujian Sejarah: 14 Mei 2025</li>
            <li><i class="fas fa-atom"></i> Ujian Ekonomi: 15 Mei 2025</li>
            <li><i class="fas fa-calculator"></i> Ujian Seni: 16 Mei 2025</li>
            <li><i class="fas fa-atom"></i> Ujian Olahraga: 17 Mei 2025</li>
        </ul>
        <a class="nav-link" href="dashboard_mahasiswa.php"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>
