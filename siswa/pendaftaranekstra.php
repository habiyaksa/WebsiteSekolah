<?php 
session_start();
if (!isset($_SESSION['akun_siswa'])) {
  header("Location: login_siswa.php");
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Form Pendaftaran Ekstra</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-r from-white to-gray-600 min-h-screen flex items-center justify-center p-6">

  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg">
    <h1 class="text-2xl lg:text-3xl font-bold text-center text-gray-600 mb-6">
      Pendaftaran Ekstrakurikuler
    </h1>

    <form action="prosespendaftaranekstra.php" method="post" id="form-pendaftaran" class="space-y-5">
      
      <div>
        <label for="idekstra" class="block text-sm font-medium text-gray-700 mb-1">
          Pilih Ekstrakurikuler <i class="text-red-500">*</i>
        </label>
        <select name="idekstra" id="idekstra" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-black focus:outline-none" >
          <option value="" disabled selected>-- Pilih Ekstra --</option>
          <option value="1">Jurnalistik</option>
          <option value="2">Pramuka</option>
          <option value="3">Paskibra</option>
          <option value="4">Bulutangkis</option>
          <option value="5">Bola Basket</option>
          <option value="6">Sepak Bola</option>
        </select>
      </div>

      <div>
        <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">
          Nama <i class="text-red-500">*</i>
        </label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-black focus:outline-none" />
      </div>
      <div>
        <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">
          NIS <i class="text-red-500">*</i>
        </label>
        <input type="number" id="nis" name="nis" placeholder="Masukkan NIS" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-black focus:outline-none" />
        <p class="text-xs text-gray-500 mt-1">
          Isikan NIS tanpa tanda baca (hanya angka).
        </p>
      </div>

      <div>
        <input type="email" name="email" id="email" placeholder="Masukkan email" required class=" w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2  focus:ring-black focus:outline-none">
      </div>

      <div>
        <label for="tanggaldaftar" class="block text-sm font-medium text-gray-700 mb-1">   
          Tanggal Daftar <i class="text-red-500">*</i>
        </label>
        <input type="date" id="tanggaldaftar" name="tanggaldaftar" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
      </div>

      <div class="flex justify-between pt-4">
        <button type="reset" class="w-1/3 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition"
        >
          Reset
        </button>
        <button type="submit" class="w-2/3 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition"
        >
          Daftar
        </button>
      </div>
      <div>
        <a href="logout_siswa.php" class="text-black-700 hover:text-red-700 hover:border hover:border-gray-400 p-2 rounded-md">keluar</a>
      </div>
    </form>
  </div>

</body>
</html>
