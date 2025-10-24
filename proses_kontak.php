<?php
include 'koneksi.php'; // pastikan koneksi sudah benar

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['message']);

    // Validasi input
    if (!empty($nama) && !empty($email) && !empty($pesan)) {

        // Siapkan query menggunakan prepared statement
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $pesan);

        if ($stmt->execute()) {
            echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='kontak.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengirim pesan.'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
    }
}

$conn->close();
?>
