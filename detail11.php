<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  />
  <link rel="stylesheet" href="styles1.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    rel="stylesheet"
  />
  <title>Averess</title>
  <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <nav>
    <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;"/></a>
    <a href="dashboard2.html" class="active">Beranda</a>
    <a href="explor.html">Jelajahi</a>
    <a href="create.html">Buat</a>
    <input type="text" class="search" placeholder="Search" style="width: 100%; max-width: 900px; padding: 10px 15px; border-radius: 20px; border: 1px solid #ccc; font-size: 16px; box-sizing: border-box;" />
    <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
    <a href="#" class="icon" id="message-icon"><i class="fas fa-comment-dots"></i></a>
    <a href="profile.html"><img src="botak.png" alt="User profile" id="profile" style="width: 60px; height: 35px;"/></a>
  </nav>
  <a href="dashboard2.html"><button style="position: absolute; border: none; border-radius: 4px; cursor: pointer; font-size: 30px; margin-left: 190px; margin-top: 40px;">&larr;</button></a>
  <div class="container" style="width: 1000px; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; display: flex; align-items: flex-start; margin-top: 50px; margin-bottom: 50px; position: relative;">
    <img src="galeri6.jpg" alt="Image" class="image" style="width: 500px; height: 600px; object-fit: cover;"/>
    <div class="details" style="margin-left: 16px; flex: 1;">
        <div class="actions" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <div class="user-info" style="display: flex; align-items: center; gap: 8px;">
                <img src="galeri6.jpg" alt="User" style="width: 40px; height: 40px; border-radius: 50%;">
                <span style="font-size: 14px; font-weight: bold;">Zakky</span>
            </div>
            <button style="background-color: #e60023; color: #fff; border: none; padding: 8px 16px; border-radius: 25px; cursor: pointer;">Simpan</button>
        </div>
        <div class="comments" style="font-size: 14px; color: #555; margin-top: 500px;">
            <textarea placeholder="Tambahkan komentar..." style="width: 100%; height: 50px; border: 1px solid #ddd; border-radius: 15px; padding: 8px; margin-top: 8px; resize: none;"></textarea>
        </div>
    </div>
</div>
</div>
</div>
  <div class="notification-container" id="notification-container">
    <div class="w-full bg-white rounded-lg shadow-md overflow-hidden">
      <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Pembaruan</h2>
        <button class="text-sm text-gray-500">Dilihat</button>
      </div>
      <div class="divide-y divide-gray-200">
        <a href="#link1" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
          <img src="casual fit inspo.jpeg" alt="Image" class="w-10 h-10 rounded-full object-cover">
          <div class="ml-3 flex-1">
            <p class="text-sm text-gray-700">Sepertinya ini gaya kamu banget</p>
            <span class="text-xs text-gray-500">5 j</span>
          </div>
        </a>
        <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
          <img src="Fiona Love You Shirt Collar Linen Trench Dress.jpeg" alt="Image" class="w-10 h-10 rounded-full object-cover">
          <div class="ml-3 flex-1">
            <p class="text-sm text-gray-700">Anda akan menyukai ini</p>
            <span class="text-xs text-gray-500">20 j</span>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Pesan Container -->
  <div class="message-container" id="message-container">
    <div class="w-96 bg-white rounded-lg shadow-md h-[600px] overflow-y-auto">
      <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
        <button class="text-gray-700 text-lg font-semibold">Pesan</button>
        <button class="text-gray-500">
          <svg xmlns="edi" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="divide-y divide-gray-200 px-4 py-3">
        <a href="pesan2.html">
          <label class="flex items-center px-4 py-3 mb-3 hover:bg-gray-100 rounded-lg cursor-pointer">
            <div class="flex items-center justify-center w-10 h-10 bg-red-600 rounded-full">
              <img src="edit.png" alt="" width="20" height="20">
            </div>
            <div class="ml-3">
              <p class="text-sm font-semibold text-gray-700">Pesan baru</p>
            </div>
          </label>
        </a>
        <a href="#invite-friends" class="flex items-center px-4 py-3 mb-3 hover:bg-gray-100 rounded-lg">
          <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full">
              <img src="add-user.png" alt="" width="20" height="20">
          </div>
          <div class="ml-3">
              <p class="text-sm font-semibold text-gray-700">Undang teman-teman Anda</p>
              <p class="text-xs text-gray-500">Hubungkan untuk mulai mengobrol</p>
          </div>
      </a>
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
        <a style="text-decoration: none;" href="ourservices.html"><h3>layanan kami</a>
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
          <input type="text" placeholder="Ketik Email..." />
          <button><i class="fa fa-paper-plane"></i></button>
        </form>
      </div>
    </div>
</footer>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const bellIcon = document.getElementById('bell-icon');
      const notificationContainer = document.getElementById('notification-container');
      const messageIcon = document.getElementById('message-icon');
      const messageContainer = document.getElementById('message-container');
  
      
      bellIcon.addEventListener('click', function() {
        notificationContainer.classList.toggle('active');
        messageContainer.classList.remove('active');
      });
  
      
      messageIcon.addEventListener('click', function() {
        messageContainer.classList.toggle('active');
        notificationContainer.classList.remove('active');
      });
    });
  </script>
  
</body>
</html>
