<?php
session_start();
include '../koneksi.php';

if (isset($_POST['nis']) && isset($_POST['password'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM akun_siswa WHERE nis = ? AND password = ?");
    $query->bind_param("is", $nis, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        $_SESSION['akun_siswa'] = [
            'nis' => $data['nis'],
            'nama' => $data['nama']
        ];
        echo "
        <script>
            alert('Login berhasil! Selamat datang, {$data['nama']}');
            window.location.href='pendaftaranekstra.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('NIS atau Password salah!');
            window.location.href='login_siswa.php';
        </script>
        ";
    }

    $query->close();
    $conn->close();
} else {
    echo "
    <script>
        alert('Lengkapi data login!');
        window.location.href='login_siswa.php';
    </script>
    ";
}
?>