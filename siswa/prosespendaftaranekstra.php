<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include '../koneksi.php';

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Ambil data dari form
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$email = $_POST['email'];
$idekstra = isset($_POST['idekstra']) ? (int) $_POST['idekstra'] : 0;
$tanggaldaftar = $_POST['tanggaldaftar'];

// Cek apakah NIS sudah terdaftar di tabel siswa
$sql_check_siswa = "SELECT * FROM siswa WHERE nis = ?";
$stmt_siswa = $conn->prepare($sql_check_siswa);
$stmt_siswa->bind_param("i", $nis);
$stmt_siswa->execute();
$result_siswa = $stmt_siswa->get_result();

if ($result_siswa->num_rows == 0) {
    echo "<script>alert('NIS tidak ditemukan.');window.history.back();</script>";
    exit;
}

// Cek apakah siswa sudah daftar ekstra yang sama
$sql_check_duplikat = "SELECT * FROM pendaftaranekstra WHERE nis = ? AND idekstra = ?";
$stmt_duplikat = $conn->prepare($sql_check_duplikat);
$stmt_duplikat->bind_param("ii", $nis, $idekstra);
$stmt_duplikat->execute();
$result_duplikat = $stmt_duplikat->get_result();

if ($result_duplikat->num_rows > 0) {
    echo "<script>alert('Anda sudah mendaftar ekstrakurikuler ini.');window.history.back();</script>";
    exit;
}

// Simpan pendaftaran baru ke database
$sql_insert = "INSERT INTO pendaftaranekstra (idekstra, nis, tanggaldaftar) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("iis", $idekstra, $nis, $tanggaldaftar);

if ($stmt->execute()) {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'id1826736@gmail.com'; 
        $mail->Password   = 'dbln oqqq euzi dkdh';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('emailkamu@gmail.com', 'Web Sekolah');
        $mail->addAddress($email, $nama);

        $mail->isHTML(true);
        $mail->Subject = 'Pendaftaran Ekstrakurikuler Berhasil';
        
        // Nama ekstra berdasarkan id
        $nama_ekstra = match($idekstra) {
            1 => "Jurnalistik",
            2 => "Pramuka",
            3 => "Paskibra",
            4 => "Bulutangkis",
            5 => "Bola Basket",
            6 => "Sepak Bola",
            default => "Ekstrakurikuler Tidak Dikenal"
        };

        $mail->Body = "
            <div style='font-family:Arial,sans-serif;'>
                <h2 style='color:#333;'>Halo, $nama 👋</h2>
                <p>Terima kasih telah mendaftar pada ekstrakurikuler <b>$nama_ekstra</b>.</p>
                <p><b>Tanggal Daftar:</b> $tanggaldaftar</p>
                <hr>
                <p>Salam hangat,<br><b>Admin Web Sekolah</b></p>
            </div>
        ";

        $mail->send();
        echo "<script>
                alert('Pendaftaran berhasil! Email konfirmasi telah dikirim ke $email');
                window.location='pendaftaranekstra.php';
              </script>";

    } catch (Exception $e) {
        echo "<script>
                alert('Pendaftaran berhasil, tapi email gagal dikirim: {$mail->ErrorInfo}');
                window.location='../ekstra.php';
              </script>";
    }

} else {
    echo "<script>alert('Terjadi kesalahan: ".$stmt->error."');window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>