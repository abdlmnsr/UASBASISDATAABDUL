<?php
session_start(); 

$servername = "localhost"; // atau alamat server database Anda
$username = "root"; // atau username yang Anda temukan
$password = ""; // atau password baru yang Anda atur
$dbname = "db_connection"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah pengguna adalah mahasiswa
    $sqlMahasiswa = "SELECT * FROM mhs WHERE username = '$username' AND password = '$password'";
    $resultMahasiswa = $conn->query($sqlMahasiswa);

    if ($resultMahasiswa->num_rows > 0) {
        // Ambil data mahasiswa
        $user = $resultMahasiswa->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = 'mahasiswa'; // Simpan role di sesi

        // Alihkan ke dashboard mahasiswa
        header("Location: dashboard_mahasiswa.php");
        exit();
    }

    // Cek apakah pengguna adalah admin atau dosen
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data pengguna
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Simpan role di sesi

        // Alihkan ke dashboard sesuai role
        switch ($user['role']) {
            case 'admin':
                header("Location: dashboard_admin.php");
                break;
            case 'dosen':
                header("Location: dashboard_dosen.php");
                break;
            default:
                header("Location: login.php"); // Jika role tidak dikenali
                break;
        }
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            color: white; /* Warna teks */
        }
        .login-container {
    background-color: rgba(0, 0, 0, 0.7); /* Latar belakang hitam dengan transparansi */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
    width: 300px; /* Lebar kontainer */
}
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
       
/* From Uiverse.io by mrhyddenn */ 
button {
  position: relative;
  padding: 10px 20px;
  border-radius: 7px;
  border: 1px solid rgb(255, 255, 255);
  font-size: 14px;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 2px;
  background: transparent;
  color: white;
  overflow: hidden;
  box-shadow: 0 0 0 0 transparent;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}

button:hover {
  background: rgb(61, 106, 255);
  box-shadow: 0 0 30px 5px rgba(0, 142, 236, 0.815);
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}

button:hover::before {
  -webkit-animation: sh02 0.5s 0s linear;
  -moz-animation: sh02 0.5s 0s linear;
  animation: sh02 0.5s 0s linear;
}

button::before {
  content: '';
  display: block;
  width: 0px;
  height: 86%;
  position: absolute;
  top: 7%;
  left: 0%;
  opacity: 0;
  background: #fff;
  box-shadow: 0 0 50px 30px #fff;
  -webkit-transform: skewX(-20deg);
  -moz-transform: skewX(-20deg);
  -ms-transform: skewX(-20deg);
  -o-transform: skewX(-20deg);
  transform: skewX(-20deg);
}

@keyframes sh02 {
  from {
    opacity: 0;
    left: 0%;
  }

  50% {
    opacity: 1;
  }

  to {
    opacity: 0;
    left: 100%;
  }
}

button:active {
  box-shadow: 0 0 0 0 transparent;
  -webkit-transition: box-shadow 0.2s ease-in;
  -moz-transition: box-shadow 0.2s ease-in;
  transition: box-shadow 0.2s ease-in;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>