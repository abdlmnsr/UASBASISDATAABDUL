<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Aplikasi Ujian Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #dee2e6);
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .about-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h1 {
            color: #343a40;
            font-size: 26px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .nav-link {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #343a40;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 6px;
            transition: background 0.3s, transform 0.2s;
        }

        .nav-link:hover {
            background: #495057;
            transform: scale(1.1);
        }

        .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="about-container">
        <h1><i class="fas fa-info-circle"></i> Tentang Aplikasi Ujian Online</h1>
        <p>Aplikasi Ujian Online ini dirancang untuk meningkatkan efisiensi dan akurasi dalam proses evaluasi akademik. Dengan sistem yang terstruktur dan terintegrasi, mahasiswa dapat mengikuti ujian secara fleksibel, kapan saja dan di mana saja. Teknologi ini tidak hanya mempermudah aksesibilitas, tetapi juga memastikan keadilan dan transparansi dalam penilaian.</p>
        <p>Melalui fitur-fitur canggih, aplikasi ini mendukung berbagai jenis ujian, mulai dari pilihan ganda hingga soal esai, serta memberikan laporan hasil secara instan kepada pengguna. Aplikasi ini merupakan solusi inovatif untuk menghadirkan pengalaman ujian yang lebih **terorganisir, modern, dan interaktif**.</p>
        <a class="nav-link" href="dashboard_mahasiswa.php"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>
