<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <link rel="stylesheet" href="asset/css/style.css">
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">

  <main class="bg-white rounded-2xl shadow-lg p-10 w-96">
    <h1 class="text-3xl text-center mb-6 poppins-custom">Login Admin </h1>
    
    <form action="proseslogin.php" method="POST" class="space-y-5">

      <div>
        <label for="username" class="block text-gray-700 font-medium mb-2">Username <i class="text-red-500">*</i></label>
        <input type="text" name="username" id="username" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-medium mb-2">Password <i class="text-red-500">*</i></label>
        <input type="password" name="password" id="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
      </div>

      <button 
        type="submit" class="w-full bg-gray-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition duration-300">Masuk
      </button>
    </form>

  </main>

</body>
</html>
