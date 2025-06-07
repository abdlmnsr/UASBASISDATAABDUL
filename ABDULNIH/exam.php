<?php
session_start();
// Ambil parameter subject dari URL
$subject = $_GET['subject'];

// Inisialisasi soal, jawaban benar, dan opsi
$questions = [];
$answers = [];
$options = []; 
$score = 0;
if ($subject == 'matematika') {
    $questions = [
        "Apa hasil dari 5 + 7?",
        "Berapakah 12 x 8?",
        "Berapa hasil dari 15 - 5?",
        "Apa itu 2^3?",
        "Berapa hasil dari 20 / 4?",
        "Apa hasil dari 7 x 3?",
        "Berapa persen dari 50 adalah 25?",
        "Jika x = 2, berapa nilai dari 3x + 1?",
        "Apa hasil dari 9 + 10?",
        "Berapa akar dari 16?"
    ];
    $answers = ['12', '96', '10', '8', '5', '21', '50%', '7', '19', '4'];
    $options = [
        ['10', '12', '14', '16'],
        ['80', '90', '96', '100'],
        ['5', '10', '15', '20'],
        ['6', '7', '8', '9'],
        ['2', '3', '5', '4'],
        ['18', '21', '24', '27'],
        ['50%', '25%', '75%', '100%'],
        ['3', '5', '7', '9'],
        ['15', '17', '19', '21'],
        ['2', '4', '6', '8']
    ];
} elseif ($subject == 'fisika') {
    $questions = [
        "Apa hukum Newton pertama?",
        "Apa satuan gaya dalam SI?",
        "Apa yang dimaksud dengan energi potensial?",
        "Apa hukum kekekalan energi?",
        "Apa satuan tekanan dalam SI?",
        "Apa itu momentum?",
        "Apa yang dimaksud dengan percepatan?",
        "Apa hukum Archimedes?",
        "Sebutkan contoh gaya!",
        "Apa itu gelombang?"
    ];
    $answers = ['Inersia', 'Newton', 'Energi yang disimpan', 'Energi tidak dapat diciptakan atau dimusnahkan', 'Pascal', 'Massa x Kecepatan', 'Perubahan kecepatan', 'Gaya angkat pada benda dalam fluida', 'Gaya gesek', 'Getaran dalam medium'];
    $options = [
        ['Inersia', 'Akselerasi', 'Gaya', 'Momentum'],
        ['Newton', 'Pascal', 'Joule', 'Watt'],
        ['Energi yang disimpan', 'Energi yang bergerak', 'Energi yang hilang', 'Energi yang terbuang'],
        ['Energi tidak dapat diciptakan atau dimusnahkan', 'Energi dapat diciptakan', 'Energi terbuang', 'Energi bisa hilang'],
        ['Pascal', 'Bar', 'Atmosfer', 'Kilopascal'],
        ['Massa x Kecepatan', 'Massa x Percepatan', 'Gaya x Waktu', 'Kecepatan x Waktu'],
        ['Perubahan kecepatan', 'Pergerakan', 'Kecepatan konstan', 'Gaya'],
        ['Gaya angkat pada benda dalam fluida', 'Gaya gesek', 'Gaya gravitasi', 'Gaya sentrifugal'],
        ['Gaya gesek', 'Gaya tarik', 'Gaya dorong', 'Gaya magnet'],
        ['Getaran dalam medium', 'Gelombang suara', 'Gelombang cahaya', 'Gelombang elektromagnetik']
    ];
} elseif ($subject == 'kimia') {
    $questions = [
        "Apa rumus kimia air?",
        "Sebutkan jenis-jenis ikatan kimia!",
        "Apa itu asam?",
        "Apa itu basa?",
        "Apa yang dimaksud dengan reaksi eksoterm?",
        "Sebutkan contoh senyawa organik!",
        "Apa itu pH?",
        "Apa itu larutan?",
        "Apa hukum Boyle?",
        "Apa yang dimaksud dengan ion?"
    ];
    $answers = ['H2O', 'Ikatan ion, ikatan kovalen', 'Zat yang melepaskan proton', 'Zat yang menerima proton', 'Reaksi yang melepaskan panas', 'Alkohol, gula', 'Ukuran keasaman', 'Campuran homogen', 'Tekanan x Volume = Konstan', 'Partikel bermuatan listrik'];
    $options = [
        ['H2O', 'O2', 'CO2', 'H2'],
        ['Ikatan ion', 'Ikatan kovalen', 'Ikatan logam', 'Semua di atas'],
        ['Zat yang melepaskan proton', 'Zat yang menerima proton', 'Zat netral', 'Zat asam'],
        ['Zat yang menerima proton', 'Zat yang melepaskan proton', 'Zat basa', 'Zat netral'],
        ['Reaksi yang melepaskan panas', 'Reaksi yang menyerap panas', 'Reaksi yang tidak menghasilkan energi', 'Reaksi yang menghasilkan gas'],
        ['Alkohol', 'Asam asetat', 'Gula', 'Semua di atas'],
        ['Ukuran keasaman', 'Ukuran kebasaan', 'Ukuran suhu', 'Ukuran tekanan'],
        ['Campuran homogen', 'Campuran heterogen', 'Campuran cair', 'Campuran gas'],
        ['Tekanan x Volume = Konstan', 'Tekanan + Volume = Konstan', 'Tekanan - Volume = Konstan', 'Semua di atas'],
        ['Partikel bermuatan listrik', 'Partikel netral', 'Partikel positif', 'Partikel negatif']
    ];
} elseif ($subject == 'biologi') {
    $questions = [
        "Apa itu fotosintesis?",
        "Sebutkan bagian-bagian sel!",
        "Apa fungsi DNA?",
        "Apa yang dimaksud dengan ekosistem?",
        "Sebutkan proses reproduksi pada tumbuhan!",
        "Apa itu mutasi?",
        "Apa yang dimaksud dengan spesies?",
        "Apa itu rantai makanan?",
        "Sebutkan fungsi protein!",
        "Apa itu habitat?"
    ];
    $answers = ['Proses mengubah cahaya menjadi energi', 'Nukleus, sitoplasma, membran sel', 'Menyimpan informasi genetik', 'Komunitas hidup dan lingkungan', 'Pembuahan, pembelahan sel', 'Perubahan genetik', 'Kumpulan individu yang sejenis', 'Rangkaian transfer energi', 'Membangun jaringan tubuh', 'Tempat tinggal organisme'];
    $options = [
        ['Proses mengubah cahaya menjadi energi', 'Proses pembuatan makanan', 'Proses respirasi', 'Proses fotosintesis dan respirasi'],
        ['Nukleus', 'Sitoplasma', 'Membran sel', 'Semua di atas'],
        ['Menyimpan informasi genetik', 'Menghasilkan energi', 'Mengendalikan metabolisme', 'Membantu reproduksi'],
        ['Komunitas hidup dan lingkungan', 'Hanya hewan', 'Hanya tumbuhan', 'Hanya mikroorganisme'],
        ['Pembuahan', 'Pembelahan sel', 'Fotosintesis', 'Respirasi'],
        ['Perubahan genetik', 'Proses reproduksi', 'Proses metabolisme', 'Proses pertumbuhan'],
        ['Kumpulan individu yang sejenis', 'Kumpulan individu yang berbeda', 'Kumpulan semua organisme', 'Kumpulan spesies langka'],
        ['Rangkaian transfer energi', 'Rangkaian makanan', 'Rangkaian reproduksi', 'Rangkaian ekosistem'],
        ['Membangun jaringan tubuh', 'Menyimpan energi', 'Menghasilkan hormon', 'Menghasilkan enzim'],
        ['Tempat tinggal organisme', 'Proses reproduksi', 'Jaringan', 'Organ']
    ];
} elseif ($subject == 'sejarah') {
    $questions = [
        "Siapa yang menemukan benua Amerika?",
        "Apa yang terjadi pada tahun 1945?",
        "Sebutkan penyebab Perang Dunia I!",
        "Siapa pemimpin Revolusi Prancis?",
        "Apa itu Perang Dingin?",
        "Sebutkan tiga kerajaan besar di Indonesia!",
        "Apa itu Sumpah Pemuda?",
        "Siapa Soekarno?",
        "Apa yang dimaksud dengan kolonialisme?",
        "Sebutkan tokoh-tokoh reformasi!"
    ];
    $answers = ['Cristopher Columbus', 'Akhir Perang Dunia II', 'Persaingan kekuatan besar', 'Maximilien Robespierre', 'Konflik antara blok timur dan barat', 'Majapahit, Sriwijaya, Mataram', 'Janji untuk bersatu', 'Presiden pertama Indonesia', 'Penguasaan wilayah oleh negara asing', 'Amien Rais, Gus Dur'];
    $options = [
        ['Cristopher Columbus', 'Ferdinand Magellan', 'Marco Polo', 'Vasco da Gama'],
        ['Akhir Perang Dunia II', 'Perang Dingin dimulai', 'Pemerintahan Soviet', 'Revolusi Prancis'],
        ['Persaingan kekuatan besar', 'Perang antar negara', 'Konflik agama', 'Revolusi industri'],
        ['Maximilien Robespierre', 'Napoleon Bonaparte', 'Louis XVI', 'George Washington'],
        ['Konflik antara blok timur dan barat', 'Perang antara negara-negara Eropa', 'Perang melawan terorisme', 'Perang sipil'],
        ['Majapahit', 'Sriwijaya', 'Mataram', 'Kerajaan Sunda'],
        ['Janji untuk bersatu', 'Perjanjian damai', 'Deklarasi kemerdekaan', 'Rencana pembangunan'],
        ['Presiden pertama Indonesia', 'Wakil presiden', 'Menteri luar negeri', 'Panglima TNI'],
        ['Penguasaan wilayah oleh negara asing', 'Perang untuk kemerdekaan', 'Perjanjian internasional', 'Persetujuan damai'],
        ['Amien Rais', 'B.J. Habibie', 'Gus Dur', 'Soeharto']
    ];
} elseif ($subject == 'ekonomi') {
    $questions = [
        "Apa itu inflasi?",
        "Sebutkan jenis-jenis pasar!",
        "Apa yang dimaksud dengan permintaan?",
        "Apa itu penawaran?",
        "Apa yang dimaksud dengan harga keseimbangan?",
        "Sebutkan faktor-faktor yang mempengaruhi ekonomi!",
        "Apa itu GDP?",
        "Apa yang dimaksud dengan subsidi?",
        "Sebutkan contoh barang publik!",
        "Apa itu pajak?"
    ];
    $answers = ['Kenaikan harga barang secara umum', 'Pasar persaingan sempurna, pasar monopoli', 'Kebutuhan yang ingin dipenuhi', 'Jumlah barang yang ditawarkan', 'Harga di mana permintaan sama dengan penawaran', 'Kebijakan pemerintah, sumber daya', 'Gross Domestic Product', 'Bantuan pemerintah untuk barang', 'Jalan, taman', 'Pungutan yang dikenakan negara'];
    $options = [
        ['Kenaikan harga barang secara umum', 'Penurunan harga barang', 'Kestabilan harga', 'Kenaikan harga barang tertentu'],
        ['Pasar persaingan sempurna', 'Pasar monopoli', 'Pasar oligopoli', 'Semua di atas'],
        ['Kebutuhan yang ingin dipenuhi', 'Jumlah barang yang dibeli', 'Harga barang', 'Jenis barang'],
        ['Jumlah barang yang ditawarkan', 'Permintaan barang', 'Kualitas barang', 'Harga barang'],
        ['Harga di mana permintaan sama dengan penawaran', 'Harga tertinggi', 'Harga terendah', 'Harga rata-rata'],
        ['Kebijakan pemerintah', 'Sumber daya alam', 'Tenaga kerja', 'Semua di atas'],
        ['Gross Domestic Product', 'Gross National Product', 'Net Domestic Product', 'Net National Product'],
        ['Bantuan pemerintah untuk barang', 'Kenaikan harga barang', 'Bantuan asing', 'Bantuan sosial'],
        ['Jalan', 'Taman', 'Sekolah', 'Semua di atas'],
        ['Pungutan yang dikenakan negara', 'Pajak penghasilan', 'Pajak barang', 'Semua di atas']
    ];
} elseif ($subject == 'seni') {
    $questions = [
        "Apa itu seni rupa?",
        "Sebutkan jenis-jenis seni!",
        "Apa yang dimaksud dengan seni pertunjukan?",
        "Sebutkan alat musik tradisional Indonesia!",
        "Apa itu lukisan?",
        "Sebutkan aliran-aliran seni!",
        "Apa yang dimaksud dengan seni kriya?",
        "Apa itu seni teater?",
        "Sebutkan unsur-unsur seni!",
        "Apa yang dimaksud dengan seni kontemporer?"
    ];
    $answers = ['Seni yang dapat dilihat', 'Seni musik, seni tari, seni lukis', 'Seni yang ditampilkan di panggung', 'Gamelan, angklung', 'Karya seni yang dibuat dengan cat', 'Klasik, modern', 'Seni tangan, kerajinan', 'Pertunjukan drama', 'Bentuk, warna, tekstur', 'Seni masa kini'];
    $options = [
        ['Seni yang dapat dilihat', 'Seni yang didengar', 'Seni yang dirasakan', 'Seni yang dibaca'],
        ['Seni musik', 'Seni tari', 'Seni lukis', 'Semua di atas'],
        ['Seni yang ditampilkan di panggung', 'Seni yang dapat dilihat', 'Seni yang dapat didengar', 'Seni yang dapat dirasakan'],
        ['Gamelan', 'Angklung', 'Seruling', 'Semua di atas'],
        ['Karya seni yang dibuat dengan cat', 'Karya seni yang dibuat dengan tanah liat', 'Karya seni yang dibuat dengan kayu', 'Karya seni yang dibuat dengan kain'],
        ['Klasik', 'Modern', 'Kontemporer', 'Semua di atas'],
        ['Seni tangan', 'Kerajinan', 'Karya seni', 'Semua di atas'],
        ['Pertunjukan drama', 'Pertunjukan musik', 'Pertunjukan tari', 'Semua di atas'],
        ['Bentuk', 'Warna', 'Tekstur', 'Semua di atas'],
        ['Seni masa kini', 'Seni masa lalu', 'Seni yang tidak terikat waktu', 'Seni tradisional']
    ];
} elseif ($subject == 'olahraga') {
    $questions = [
        "Apa tujuan dari olahraga?",
        "Sebutkan jenis-jenis olahraga!",
        "Apa yang dimaksud dengan kebugaran jasmani?",
        "Sebutkan manfaat olahraga!",
        "Apa itu olahraga tim?",
        "Apa yang dimaksud dengan olahraga individu?",
        "Sebutkan contoh olahraga udara!",
        "Apa itu olahraga air?",
        "Sebutkan olahraga yang menggunakan bola!",
        "Apa yang dimaksud dengan atlet?"
    ];
    $answers = ['Menjaga kesehatan dan kebugaran', 'Sepak bola, basket, bulu tangkis', 'Kondisi fisik yang baik', 'Meningkatkan kesehatan, relaksasi', 'Olahraga yang melibatkan tim', 'Olahraga yang dilakukan sendiri', 'Paralayang, skydiving', 'Renang, selam', 'Sepak bola, bola basket', 'Orang yang berkompetisi dalam olahraga'];
    $options = [
        ['Menjaga kesehatan dan kebugaran', 'Meningkatkan berat badan', 'Mengurangi stamina', 'Mengurangi kebugaran'],
        ['Sepak bola', 'Basket', 'Bulu tangkis', 'Semua di atas'],
        ['Kondisi fisik yang baik', 'Kondisi fisik yang buruk', 'Kondisi mental', 'Kondisi emosional'],
        ['Meningkatkan kesehatan', 'Meningkatkan stres', 'Meningkatkan beban', 'Meningkatkan risiko penyakit'],
        ['Olahraga yang melibatkan tim', 'Olahraga individu', 'Olahraga kelompok', 'Olahraga campuran'],
        ['Olahraga yang dilakukan sendiri', 'Olahraga yang dilakukan bersama', 'Olahraga yang dilakukan di luar', 'Olahraga yang dilakukan di dalam'],
        ['Paralayang', 'Skydiving', 'Selancar', 'Semua di atas'],
        ['Renang', 'Selam', 'Pelayaran', 'Semua di atas'],
        ['Sepak bola', 'Bola basket', 'Bola voli', 'Semua di atas'],
        ['Orang yang berkompetisi dalam olahraga', 'Orang yang menonton olahraga', 'Orang yang melatih olahraga', 'Orang yang mengatur olahraga']
    ];
}

// Hitung skor jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($answers as $index => $correct_answer) {
        $user_answer = $_POST["question$index"];
        if ($user_answer == $correct_answer) {
            $score += 10; // Tambah skor jika jawaban benar
        }
    }
    
    // Simpan skor ke dalam sesi
    $_SESSION[$subject] = $score;

    // Redirect ke halaman result
    header("Location: result.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian <?php echo ucfirst($subject); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #f8f9fa, #dee2e6);
    text-align: center;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

h1 {
    color: #343a40;
    font-size: 26px;
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: bold;
}

.form-group {
    background: #ffffff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: 0.3s;
}

.form-group:hover {
    transform: scale(1.02);
}

label {
    font-weight: bold;
    font-size: 18px;
}

.btn-submit {
    width: 100%;
    padding: 12px;
    font-size: 18px;
    background: linear-gradient(to right, #007BFF, #0056b3);
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.btn-submit:hover {
    background: #0056b3;
    transform: scale(1.05);
}

.timer-container {
    font-size: 24px;
    font-weight: bold;
    background: linear-gradient(to right, #212121, #474747);
    color: white;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: inline-block;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.warning {
    color: red;
    font-size: 18px;
    margin-top: 10px;
    font-weight: bold;
    display: none;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Ujian <?php echo ucfirst($subject); ?></h1>

        <!-- Timer -->
        <div class="timer-container">
            Waktu Tersisa: <span id="timer">30:00</span>
        </div>
        <div class="warning" id="warning-message">⚠️ Waktu hampir habis!</div>

        <form method="POST" id="examForm">
            <?php foreach ($questions as $index => $question): ?>
                <div class="form-group">
                    <label><?php echo ($index + 1) . ". " . $question; ?></label>
                    <?php foreach ($options[$index] as $option): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question<?php echo $index; ?>" value="<?php echo $option; ?>" required>
                            <label class="form-check-label"><?php echo $option; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary btn-submit">Kirim Jawaban</button>
        </form>
    </div>

    <script>
        let timeLeft = 10 * 60; // 30 menit dalam detik
        let timerInterval = setInterval(updateTimer, 1000);

        function updateTimer() {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;

            document.getElementById("timer").innerText = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
            
            // Peringatan jika waktu kurang dari 5 menit
            if (timeLeft === 300) {
                document.getElementById("warning-message").style.display = "block";
            }

            // Jika waktu habis, kirim ujian otomatis
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert("Waktu habis! Ujian telah dikirim.");
                document.getElementById("examForm").submit(); // Kirim otomatis
            }

            timeLeft--;
        }
    </script>

</body>
</html>
