<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-700 to-gray-300 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center text-gray-600 mb-6">Login Siswa</h2>
    <form action="proses_login_siswa.php" method="POST" class="space-y-4">
      <div>
        <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
        <input type="text" id="nis" name="nis" required
          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400" />
      </div>

      <button type="submit" name="login"
        class="w-full bg-gray-600 text-white py-2 rounded-md hover:bg-green-700 transition">Login</button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Belum punya akun? 
      <a href="daftar_siswa.php" class="text-gray-600 hover:underline">Daftar di sini</a>
    </p>
  </div>
</body>
</html>