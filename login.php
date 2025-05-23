<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Averess Login</title>
    <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form>
          <h1>Buat Akun </h1>
          <div class="social-icons">
            <a href="#" class="icon"
              ><i class="fa-brands fa-google-plus-g"></i
            ></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
          <span>Gunakan Email dan Kata sandi Anda</span>
          <input type="text" placeholder="Name" />
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Kata Sandi" />
          <button>Daftar</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form>
          <h1>Masuk</h1>
          <div class="social-icons">
            <a href="#" class="icon"
              ><i class="fa-brands fa-google-plus-g"></i
            ></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
          <span>Gunakan Email dan Kata sandi Anda
          </span>
          <input type="email" placeholder="Email" required />
          <input type="password" placeholder="kata Sandi" />
          <div class="remember">
            <input type="checkbox" id="remember" />
            <label for="remember">Remember me</label>
          </div>
          <a href="#">Lupakan Kata sandi?</a>
          <div class="log">
            <a class="log-a" href="dashboard2.php">Masuk</a>
          </div>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Selamat Datang kembali
!            </h1>
            <p>Masukkan detail pribadi Anda untuk menggunakan semua fitur situs
            </p>
            <button class="hidden" id="login">Masuk</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Selamat Datang Di, Averess</h1>
            <p>
              Daftarkan dengan detail pribadi Anda untuk menggunakan semua fitur situs

            </p>
            <button class="hidden" id="register">Daftar</button>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
