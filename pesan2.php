<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Averess</title>
    <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="styles1.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </head>

  <body class="bg-gray-100">
    <nav>
      <a href="#"
        ><img
          class="logo"
          src="AA brandmark.jpg"
          alt="Averess logo"
          style="width: 50px; height: 50px"
      /></a>
      <a href="dashboard2.php" class="active">Beranda</a>
      <a href="explor.php">Jelajahi</a>
      <a href="create.php">Buat</a>
      <input
        type="text"
        class="search"
        placeholder="Search"
        style="
          width: 100%;
          max-width: 900px;
          padding: 10px 15px;
          border-radius: 20px;
          border: 1px solid #ccc;
          font-size: 16px;
          box-sizing: border-box;
        "
      />
      <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
      <a href="#" class="icon" id="message-icon"
        ><i class="fas fa-comment-dots"></i
      ></a>
      <a href="profile.php"
        ><img
          src="botak.png"
          alt="User profile"
          id="profile"
          style="width: 60px; height: 35px"
      /></a>
    </nav>
    <div class="flex justify-center items-center h-screen">
      <div class="w-96 bg-white rounded-lg shadow-md h-[600px] overflow-y-auto">
        <div
          class="flex items-center justify-between px-4 py-3 border-b border-gray-200"
        >
          <h1 class="text-gray-700 text-lg font-semibold">Pesan</h1>
          <button class="text-gray-500"></button>
        </div>
        <div class="px-4 py-3">
          <div class="flex items-center bg-gray-100 rounded-lg shadow-sm mb-4">
            <input
              type="text"
              placeholder="Cari berdasarkan nama atau email"
              class="flex-grow px-4 py-2 bg-transparent border-none focus:outline-none rounded-l-lg"
            />
            <button
              class="px-4 py-2 bg-red-500 text-white font-medium rounded-r-lg hover:bg-red-600 transition"
            >
              Cari
            </button>
          </div>
          <div class="flex items-start space-x-2">
            <img src="kucing.jpg" alt="Profile" class="w-8 h-8 rounded-full" />
            <div>
              <p class="text-sm text-gray-700 font-semibold">Rosele</p>
              <p class="text-xs text-gray-500">Konten komentar...</p>
              <div
                class="text-xs text-gray-500 flex items-center space-x-4 mt-1"
              >
                <span>5 hr</span>
                <span class="cursor-pointer text-red-500">Balas</span>
              </div>
            </div>
          </div>

          <div class="flex items-start space-x-2 mt-4">
            <img
              src="yaa3 (1).jpeg"
              alt="Profile"
              class="w-8 h-8 rounded-full"
            />
            <div>
              <p class="text-sm text-gray-700 font-semibold">Soquemeguerro</p>
              <p class="text-xs text-gray-500">sangat bagus</p>
              <div
                class="text-xs text-gray-500 flex items-center space-x-4 mt-1"
              >
                <span>1 mgg</span>
                <span class="cursor-pointer text-red-500">Balas</span>
              </div>
            </div>
          </div>

          <div class="flex items-start space-x-2 mt-4">
            <img
              src="Penguin ♦.jpeg"
              alt="Profile"
              class="w-8 h-8 rounded-full"
            />
            <div>
              <p class="text-sm text-gray-700 font-semibold">Diva</p>
              <p class="text-xs text-gray-500">otfit yang bagus</p>
              <div
                class="text-xs text-gray-500 flex items-center space-x-4 mt-1"
              >
                <span>1 mgg</span>
                <span class="cursor-pointer text-red-500">Balas</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer >
      <div class="row">
        <div class="col" id="company">
          <img src="AA brandmark.jpg" alt="" class="logo" />
          <p>
            Kami mengkhususkan diri dalam merancang, menjadikan bisnis Anda merek. Coba layanan premium kami.
  
          </p>
          <div class="social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        <div class="col" id="services">
          <a style="text-decoration: none;" href="ourservices.html"><h3>Layanan Kami</h3></a>
          <div class="links">
            <a href="#">Ilustrasi
            </a>
            <a href="#">Materi iklan
            </a>
            <a href="#">Desain Poster
            </a>
            <a href="#">Desain Kartu
            </a>
          </div>
        </div>
        <div class="col" id="useful-links">
          <a style="text-decoration: none;" href="aboutus.html"><h3>Tentang Kami</h3></a>
          <div class="links">
            <a href="#">Tautan</a>
            <a href="#">Layanan</a>
            <a href="#">Kebijakan kami
            </a>
            <a href="#">Bantuan</a>
          </div>
        </div>
        <div class="col" id="contact">
          <a style="text-decoration: none;" href="contackus.html"><h3>Kontak Kami</h3></a>
          <div class="contact-details">
            <i class="fa fa-location"></i>
            <p>
              Buah Batu, <br />
              Bandung, INDONESIA
            </p>
          </div>
          <div class="contact-details">
            <i class="fa fa-phone"></i>
            <p>(021) 21031032</p>
          </div>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="form">
          <form action="">
            
          </form>
        </div>
      </div>
  </footer>
  </body>
</html>
