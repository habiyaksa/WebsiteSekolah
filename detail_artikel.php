<?php
include 'includes/header.php';
include 'koneksi.php';

// Cek apakah ada idartikel di URL
if (!isset($_GET['idartikel'])) {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='berita.php';</script>";
    exit;
}

$id = intval($_GET['idartikel']);
$query = $conn->prepare("SELECT judul, isi, tanggal, gambar, deskripsi_singkat FROM artikel WHERE idartikel = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='berita.php';</script>";
    exit;
}

$artikel = $result->fetch_assoc();
?>
<?php include 'includes/header.php'; ?>
<main class="bg-gray-50 py-10 flex-grow">
    <div class="p-20">

    </div>
  <div class="max-w-4xl mx-auto px-4">
    
    <!-- Gambar Thumbnail -->
    <?php if (!empty($artikel['gambar'])): ?>
      <img src="uploads/<?= htmlspecialchars($artikel['gambar']) ?>" alt="<?= htmlspecialchars($artikel['judul']) ?>" class="w-full h-96 object-cover rounded-lg shadow">
    <?php endif; ?>

    <!-- Judul dan Tanggal -->
    <h1 class="text-4xl font-bold text-gray-800 mt-8 mb-2"><?= htmlspecialchars($artikel['judul']) ?></h1>
    <p class="text-gray-500 text-sm mb-6"><?= date('d M Y', strtotime($artikel['tanggal'])) ?></p>

    <!-- Deskripsi Singkat -->
    <p class="text-gray-700 italic mb-8"><?= htmlspecialchars($artikel['deskripsi_singkat']) ?></p>

    <!-- Isi Artikel -->
<div class="prose max-w-none text-gray-800 leading-relaxed">
  <?= str_replace('../uploads/', 'uploads/', $artikel['isi'])?>
</div>

    <!-- Tombol Kembali -->
    <div class="mt-10">
      <a href="berita.php" class="inline-block bg-[#27374D] text-white px-4 py-2 rounded hover:bg-[#1b2838] transition">
        ← Kembali ke Daftar Artikel
      </a>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>