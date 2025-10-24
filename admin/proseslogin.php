<?php 
include '../koneksi.php';
session_start();
 
$username = $_POST['username'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    if ($password === $data['password']) {
        $_SESSION['admin'] = $data['username'];
        header("Location: dasbord.php");
        exit;
    } 
    else 
    {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
}

$stmt->close();
$koneksi->close();
?>

?>