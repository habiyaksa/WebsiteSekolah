<?php include 'includes/header.php' ?>
<body>
  <main class="flex-grow bg-gray-100">
    <section class=" 0 py-25 px-5" id="kontak">
  <div class="container mx-auto max-w-4xl">
    <h2 class="text-3xl font-bold text-center mb-12 poppins-custom">Kontak Kami</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <div>
        <form action="proses_kontak.php" method="post" class="bg-white p-8 rounded-xl shadow-lg space-y-6">
          <div>
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
          </div>

          <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
          </div>

          <div>
            <label for="message" class="block text-gray-700 font-semibold mb-2">Pesan</label>
            <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500"></textarea>
          </div>

          <button type="submit" class="w-full bg-gray-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition-colors">Kirim Pesan</button>
        </form>
      </div>

      <div class="space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-start space-x-4">
          <span class="material-icons text-blue-500 text-4xl">location_on</span>
          <div>
            <h3 class="font-semibold text-lg">Alamat</h3>
            <p>Jl. Ganesa No.10, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</p>
          </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg flex items-start space-x-4">
          <span class="material-icons text-green-500 text-4xl">phone</span>
          <div>
            <h3 class="font-semibold text-lg">Telepon</h3>
            <p>+62 813-1630-6767</p>
          </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg flex items-start space-x-4">
          <span class="material-icons text-yellow-500 text-4xl">email</span>
          <div>
            <h3 class="font-semibold text-lg">Email</h3>
            <p>info@shoulschool.sch.id</p>
          </div>
        </div>

        <div class="mt-6">
          <iframe class="w-full h-48 rounded-xl" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507332.5255720531!2d106.97172103340749!3d-6.580167383904308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e65767c9b183%3A0x2478e3dcdce37961!2sInstitut%20Teknologi%20Bandung!5e0!3m2!1sid!2sid!4v1759586937406!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>

    </div>
  </div>
</section>
</main>
</body>
<?php include 'includes/footer.php' ?>
<script src="asset/js/script.js"></script>
</html>