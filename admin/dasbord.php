<?php
session_start();
include '../koneksi.php';

// ==== CEK LOGIN ADMIN ====
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// ==== TAMBAH ARTIKEL ====
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $namaadmin = $_POST['namaadmin'];

    $query = $conn->prepare("SELECT idadmin FROM admin WHERE username = ?");
    $query->bind_param("s", $namaadmin);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        $idadmin = $data['idadmin'];
    } else {
        echo "<script>alert('Admin tidak ditemukan!'); window.location='dasbord.php';</script>";
        exit;
    }
    $deskripsi_singkat = $_POST['deskripsi_singkat'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');

    $gambar = $_FILES['gambar']['name'];
    $tempat = $_FILES['gambar']['tmp_name'];
    $folder = "../uploads/";
    $path = $folder . basename($gambar);

    if (move_uploaded_file($tempat, $path)) {
        // Gambar berhasil diunggah
    $stmt = $conn->prepare("INSERT INTO artikel (judul, isi, tanggal, idadmin, deskripsi_singkat, gambar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $judul, $isi, $tanggal, $idadmin, $deskripsi_singkat, $gambar);
    $stmt->execute();
    echo "<script>alert('Artikel berhasil ditambahkan!'); window.location='dasbord.php';</script>";
    exit;
    } else {
        echo "<script>alert('Gagal mengunggah gambar!'); window.location='dasbord.php';</script>";
        exit;
    }
}

// ==== HAPUS ARTIKEL ====
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $stmt = $conn->prepare("DELETE FROM artikel WHERE idartikel = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "<script>alert('Artikel berhasil dihapus!'); window.location='dasbord.php';</script>";
    header("Location: dasbord.php");
    exit;
}

// ==== AMBIL DATA ARTIKEL ====
$stmt = $conn->prepare("
    SELECT 
        artikel.idartikel,
        artikel.judul,
        artikel.isi,
        artikel.tanggal,
        admin.username AS nama_admin
    FROM artikel
    JOIN admin ON artikel.idadmin = admin.idadmin
    ORDER BY artikel.tanggal DESC
");
$stmt->execute();
$artikel = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body class="bg-gray-100">
<button id="toggleSidebar" class="fixed top-4 left-4 bg-[#27374D] text-white p-2 rounded-md z-50">
  <i class="ph ph-list text-2xl"></i>
</button>

<aside id="sidebar" class="col-span-4 bg-[#27374D] text-white flex flex-col justify-between h-screen fixed w-64">
  <div>
    <div class="p-6 border-b border-gray-700 flex items-center justify-between">
      <h2 class="text-xl font-bold ml-10">filtur Admin</h2>
    </div>
    <nav class="p-4 space-y-3" id="menu">
      <a href="#tambah" class="block px-3 py-2 rounded hover:bg-gray-800">Tambah Artikel</a>
      <a href="#list" class="block px-3 py-2 rounded hover:bg-gray-800">Daftar Artikel</a>
      <a href="../beranda.php" class="block px-3 py-2 rounded hover:bg-gray-800">Lihat Website</a>
    </nav>
  </div>
  <div class="p-4 border-t border-gray-700">
    <a href="logout.php" class="block bg-red-600 text-center py-2 rounded hover:bg-red-700">Logout</a>
  </div>
</aside>

<main id="content" class="col-span-8 ml-72 transition-all duration-300">
  <div class="flex flex-col p-8 max-w-6xl mx-auto">
    <h1 class="text-3xl text-center font-bold text-gray-800 mb-2">Dashboard Admin</h1>
    <p class="text-gray-500 text-center mb-8">Kelola Artikel Sekolah</p>

    <!-- Form Tambah -->
    <div class="bg-white p-6 rounded-lg shadow mb-8" id="tambah">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Tambah Artikel Baru</h2>
      <form method="post" enctype="multipart/form-data">
        <div class="mb-4">
          <label class="block text-gray-700 mb-1">Judul Artikel</label>
          <input type="text" name="judul" required class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300">
          <label for="nama">penulis</label>
          <input type="text" name="namaadmin" required class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300">
        </div>
        <div>
          <label for="gambar_thumbnail">gambar Thumnail</label>
          <input type="file" name="gambar" accept="image/*" required class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300">
        </div>
        <div class="mb-4">
          <label for="deskripsi_singkat">deskripsi singkat artikel</label>
        <textarea type="text" name="deskripsi_singkat" required class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300">
        </textarea>
          <label class="block text-gray-700 mb-1">Isi Artikel</label>
          <textarea id="summernote" name="isi" required></textarea>
        </div>
        <button type="submit" name="tambah" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Artikel</button>
      </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow overflow-x-auto" id="list">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Daftar Artikel</h2>
      <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
          <tr>
            <th class="px-4 py-3 border">No</th>
            <th class="px-4 py-3 border">Judul</th>
            <th class="px-4 py-3 border">Penulis</th>
            <th class="px-4 py-3 border">Tanggal</th>
            <th class="px-4 py-3 border text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = $artikel->fetch_assoc()) {
              echo "
              <tr class='hover:bg-gray-100'>
                <td class='px-4 py-3 border'>$no</td>
                <td class='px-4 py-3 border'>{$row['judul']}</td>
                <td class='px-4 py-3 border'>{$row['nama_admin']}</td>
                <td class='px-4 py-3 border'>{$row['tanggal']}</td>
                <td class='px-4 py-3 border text-center'>
                  <a href='?hapus={$row['idartikel']}' onclick='return confirm(\"Yakin ingin menghapus artikel ini?\")' class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>Hapus</a>
                </td>
              </tr>";
              $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script src="asset/js/script.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300,
      placeholder: 'Tulis isi artikel di sini...',
      callbacks: {
        onImageUpload: function(files) {
          for(let i = 0; i < files.length; i++) {
            uploadImage(files[i]);
          }
        }
      }
    });

    function uploadImage(file) {
      let data = new FormData();
      data.append("file", file);
      $.ajax({
        url: 'upload_gambar.php',
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function(url) {
          $('#summernote').summernote('insertImage', url);
        },
        error: function() {
          alert('Gagal mengunggah gambar.');
        }
      });
    }
  });
</script>
</body>
</html>
