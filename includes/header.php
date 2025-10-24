  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>beranda</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <link
        rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
      />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="asset/css/style.css">
  </head>
  <body class="flex flex-col min-h-screen ">
    <nav class="fixed w-full px-4 py-4 z-50 bg-[#B4B4B8]">
      <div class="container mx-auto flex flex-wrap justify-between items-center">
          <div class="w-32"><img src="asset/img/logonew.png" alt="logo" class="">
          </div>

          <div id="menu-list"class="lg:hidden ">
            <i class="ph ph-list m-6 "></i>
          </div>
          
          <ul id="menu" class="hidden flex-col mx-6 w-full lg:flex lg:flex-row lg:w-auto lg:gap-6 m ">
              <li class=""><a href="beranda.php" class="hover:text-gray-400 poppins-custom">Beranda</a></li>
              <li class=" "><a href="berita.php" class="hover:text-gray-400 poppins-custom">berita</a></li>
              <li class=" "><a href="ekstra.php" class="hover:text-gray-400 poppins-custom">ekstra</a></li>
              <li class=" "><a href="admin/login.php" class="hover:text-gray-400 poppins-custom">login</a></li> 
          </ul>
          </div>
      </nav> 
