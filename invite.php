<?php
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
  $email = htmlspecialchars($_POST['email']);

  // Simulasi pengiriman (kamu bisa ganti dengan fungsi mail() kalau mau)
  $subject = "Ayo gabung dan ngobrol bareng di Averess!";
  $body = "Hai! Saya ingin mengundang kamu untuk bergabung dan mulai ngobrol di Averess. Klik link berikut untuk mendaftar dan mulai: https://www.averess.com";

  // Contoh jika pakai mail(): mail($email, $subject, $body);

  $successMessage = "Undangan berhasil disiapkan untuk $email. Silakan cek email Anda.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Undang Teman</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="styles1.css" />
  <style>
    /* Gaya CSS sama seperti sebelumnya */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6f7;
      margin: 0;
      padding: 0;
    }

    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      flex-wrap: wrap;
      gap: 10px;
    }

    nav a {
      text-decoration: none;
      color: #333;
      margin: 0 10px;
      font-weight: 500;
    }

    nav a.active {
      color: #e60023;
    }

    nav .icon {
      font-size: 20px;
    }

    .icon.active {
      color: #e60023;
    }

    .search {
      flex: 1;
      max-width: 900px;
      padding: 10px 15px;
      border-radius: 20px;
      border: 1px solid #ccc;
      font-size: 16px;
      box-sizing: border-box;
    }

    .invite-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 80px);
      padding: 20px;
    }

    .invite-box {
      background-color: white;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    .invite-box h2 {
      font-size: 20px;
      margin-bottom: 16px;
    }

    .invite-box p {
      color: #555;
      margin-bottom: 20px;
    }

    .invite-box input[type="email"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .invite-box button {
      width: 100%;
      padding: 12px;
      background-color: #e60023;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .invite-box button:hover {
      background-color: #cc001f;
    }

    .success-message {
      font-size: 14px;
      color: green;
      margin-top: 12px;
      text-align: center;
    }
  </style>
</head>
<body>

  <nav>
    <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;" /></a>
    <a href="dashboard2.html">Beranda</a>
    <a href="explor.html">Jelajahi</a>
    <a href="create.html">Buat</a>
    <input type="text" class="search" placeholder="Search" />
    <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
    <a href="#" class="icon active" id="message-icon"><i class="fas fa-comment-dots"></i></a>
    <a href="profile.html"><img src="botak.png" alt="User profile" id="profile" style="width: 60px; height: 35px;" /></a>
  </nav>

  <div class="invite-container">
    <div class="invite-box">
      <h2>Undang teman-teman Anda</h2>
      <p>Masukkan email teman untuk mulai mengobrol.</p>
      <form method="POST" action="">
        <input type="email" name="email" placeholder="Email teman" required>
        <button type="submit">Undang</button>
      </form>
      <?php if ($successMessage): ?>
        <div class="success-message"><?= $successMessage ?></div>
      <?php endif; ?>
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
          <input type="text" placeholder="Ketik Email..." />
          <button><i class="fa fa-paper-plane"></i></button>
        </form>
      </div>
    </div>
</footer>
</body>
</html>
