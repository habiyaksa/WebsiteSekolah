<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Import file PHPMailer
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Kirim email
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailTujuan = $_POST['email'];
    $nama = $_POST['nama'];
    $idekstra = $_POST['idekstra'];

    // Tentukan nama ekstrakurikuler berdasarkan idekstra
    $ekskulMap = [
        1 => 'Jurnalistik',
        2 => 'Pramuka',
        3 => 'Paskibra',
        4 => 'Bulutangkis',
        5 => 'Bola Basket',
        6 => 'Sepak Bola'
    ];
    $ekskul = isset($ekskulMap[$idekstra]) ? $ekskulMap[$idekstra] : 'Ekstrakurikuler Tidak Dikenal';
    


    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = ''; // ganti dengan email kamu
        $mail->Password   = ''; // password aplikasi
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Pengirim & penerima
        $mail->setFrom('emailkamu@gmail.com', 'Web Sekolah');
        $mail->addAddress($emailTujuan, $nama);

        // Isi email
        $mail->isHTML(true);
        $mail->Subject = 'Konfirmasi Pendaftaran Ekstrakurikuler';
        $mail->Body = "
            <h3>Halo, $nama!</h3>
            <p>Terima kasih telah mendaftar di ekstrakurikuler <b>$ekskul</b>.</p>
            <p>Ini adalah bukti bahwa data kamu sudah kami terima.</p>
            <br>
            <p>Salam,<br><b>Tim Web Sekolah</b></p>
        ";

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Email berhasil dikirim ke $emailTujuan"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $mail->ErrorInfo]);
    }
}
?>