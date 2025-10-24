<?php
include '../koneksi.php';

if (isset($_POST['nis']) && isset($_POST['password'])) {
    $nis = $_POST['nis'];
    $password =$_POST['password'];

    // Cek dulu apakah nisn sudah ada
    $cek = $conn->prepare("SELECT * FROM akun_siswa WHERE nis = ?");
    $cek->bind_param("i", $nis);
    $cek->execute();
    $hasil = $cek->get_result();

    if ($hasil->num_rows > 0) {
        echo "<script>alert('nisn sudah terdaftar!'); window.location='daftar_siswa.php';</script>";
        exit;
    }

    // Simpan data ke tabel akun_siswa
    $query = $conn->prepare("INSERT INTO akun_siswa (nis, password) VALUES ( ?, ?)");
    $query->bind_param("is", $nis, $password);

    if ($query->execute()) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login_siswa.php';</script>";
    } else {
        echo "Gagal menyimpan data: " . $conn->error;
    }

    $query->close();
    $conn->close();
}
?>