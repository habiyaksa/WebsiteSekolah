<?php
include 'includes/header.php';
include 'koneksi.php';

// ====== KONFIGURASI PAGINATION ======
$limit = 6; // jumlah artikel per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Ambil artikel sesuai halaman
$query = $conn->query("SELECT idartikel, judul, tanggal, gambar, deskripsi_singkat FROM artikel ORDER BY tanggal DESC LIMIT $limit OFFSET $offset");

// Hitung total artikel
$total_result = $conn->query("SELECT COUNT(*) AS total FROM artikel");
$total_artikel = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_artikel / $limit);
?>

<main class="flex-grow bg-gray-50 py-10">
  <!-- Header -->
  <section class="hero flex justify-center h-96 py-22 w-full bg-[url('asset/img/posterekstra.png')] bg-cover bg-center bg-[#27374D]/60 bg-blend-multiply">
    <h1 class="text-6xl my-24 poppins-custom text-white font-bold">Artikel Sekolah</h1>
  </section>

  <!-- Daftar Artikel -->
  <section class="py-20">
    <div class="max-w-6xl mx-auto px-4">
      <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center pb-10">Berita & Artikel Terbaru</h1>
      
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ($row = $query->fetch_assoc()) : ?>
          <a href="detail_artikel.php?idartikel=<?= $row['idartikel'] ?>" class="block bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
            
            <!-- Thumbnail -->
            <?php if (!empty($row['gambar'])): ?>
              <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" class="w-full h-48 object-cover">
            <?php else: ?>
              <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">Tidak Ada Gambar</div>
            <?php endif; ?>

            <!-- Konten -->
            <div class="p-5">
              <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600"><?= htmlspecialchars($row['judul']) ?></h2>
              <p class="text-gray-600 text-sm mb-3"><?= htmlspecialchars($row['deskripsi_singkat']) ?></p>
              <span class="text-gray-400 text-xs"><?= date('d M Y', strtotime($row['tanggal'])) ?></span>
            </div>
          </a>
        <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <div class="flex justify-center mt-12 space-x-2">
        <?php if ($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">← Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <a href="?page=<?= $i ?>" 
             class="px-4 py-2 rounded transition 
             <?= $i == $page ? 'bg-[#27374D] text-white' : 'bg-gray-200 hover:bg-gray-300' ?>">
             <?= $i ?>
          </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Berikutnya →</a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>
<script src="asset/js/script.js"></script>