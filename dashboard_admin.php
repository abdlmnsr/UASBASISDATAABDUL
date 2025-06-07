<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh; /* Pastikan tinggi 100% viewport */
            background-image: url('bglogin.jpg'); /* Ganti dengan jalur gambar Anda */
            background-size: cover; /* Mengisi seluruh area */
            background-position: center; /* Pusatkan gambar */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Tombol Toggle */
        .menu-toggle {
            font-size: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 20px;
            border-radius: 5px;
            z-index: 1000;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(to bottom, #212121, #474747);
            color: white;
            position: fixed;
            left: -260px;
            top: 0;
            padding: 20px;
            transition: left 0.4s ease-in-out;
            border-radius: 0 10px 10px 0;
            box-shadow: 4px 0px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 4px;
            transition: background 0.3s, transform 0.2s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 500;
        }

       

        h1 {
            color:rgb(255, 255, 255);
            text-shadow: 0 0 10px #00c3ff, 0 0 20px #00c3ff, 0 0 40px #00c3ff;
            animation: neon-glow 1.5s infinite alternate;
        }
        p {
            color: #f8f8f8;
            font-size: 16px;
            font: bold;
            text-align: center;
        }

        /* Animasi efek cahaya */
        @keyframes neon-glow {
            0% {
                text-shadow: 0 0 10px #00c3ff, 0 0 20px #00c3ff, 0 0 40px #00c3ff;
            }
            100% {
                text-shadow: 0 0 20px #00c3ff, 0 0 30px #00c3ff, 0 0 60px #00c3ff;
            }
        }


        .submit {
            display: block;
            width: 100%;
            padding: 10px;
            background: rgba(255, 0, 105, 0.8);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 18px;
            transition: background 0.3s;
        }

        .submit:hover {
            background: rgb(255, 0, 0);
        }
    </style>
</head>
<body>

    <!-- Tombol Toggle -->
    <button class="menu-toggle" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <h2>Dashboard Admin</h2>
        <ul>
            <li><a href="manage_users.php"><i class="fas fa-users"></i> Kelola Pengguna</a></li>
            <li><a href="statistics_admin.php"><i class="fas fa-chart-line"></i> Lihat Statistik</a></li>
            <li><a href="manage_exams.php"><i class="fas fa-file-alt"></i> Kelola Ujian</a></li>
        </ul>
        <ul>
            <li><button class="submit" onclick="location.href='logout.php';">Logout</button></li>
        </ul>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Bagian Konten -->
    <div class="content">
        <h1>SELAMAT DATANG DI DASHBOARD ADMIN</h1>
        <p>Di sini Anda bisa mengelola pengguna, ujian, dan melihat statistik.</p>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleSidebar() {
            let sidebar = document.getElementById("sidebar");
            let overlay = document.getElementById("overlay");

            sidebar.classList.toggle("show");
            overlay.style.display = sidebar.classList.contains("show") ? "block" : "none";
        }

        document.getElementById("overlay").addEventListener("click", function() {
            document.getElementById("sidebar").classList.remove("show");
            this.style.display = "none";
        });
    </script>

</body>
</html>