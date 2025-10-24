<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-700 to-gray-300 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">
      Daftar Akun Siswa
    </h2>

    <form action="poses_akun_siswa.php" method="POST" class="space-y-5">
      <!-- NIS -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">NIS</label>
        <input type="text" name="nis" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">
      </div>

      <!-- Tombol -->
      <button type="submit"
              class="w-full bg-gray-600 text-white font-semibold py-2 rounded-lg hover:bg-gray-700 transition duration-200">
        Daftar
      </button>

      <!-- Sudah punya akun -->
      <p class="text-center text-gray-600 text-sm mt-3">
        Sudah punya akun?
        <a href="login_siswa.php" class="text-gray-500 hover:underline font-semibold">Login di sini</a>
      </p>
    </form>
  </div>

</body>
</html>