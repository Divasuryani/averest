<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "averest";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Registrasi
if (isset($_POST['register'])) {
    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.');</script>";
    } else {
        echo "<script>alert('Registrasi gagal.');</script>";
    }
    $stmt->close();
}

// Login
if (isset($_POST['login'])) {
    $email = $_POST['log_email'];
    $password = $_POST['log_password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            echo "<script>alert('Login berhasil!'); window.location='dashboard2.php';</script>";
        } else {
            echo "<script>alert('Password salah.');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Averess Login</title>
    <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST">
            <h1>Buat Akun</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>Gunakan Email dan Kata sandi Anda</span>
            <input type="text" name="namapengguna" placeholder="Nama Pengguna" required />
            <input type="text" name="reg_name" placeholder="Nama" required />
            <input type="email" name="reg_email" placeholder="Email" required />
            <input type="password" name="reg_password" placeholder="Kata Sandi" required />
            <button type="submit" name="register">Daftar</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form method="POST">
            <h1>Masuk</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>Gunakan Email dan Kata sandi Anda</span>
            <input type="email" name="log_email" placeholder="Email" required />
            <input type="password" name="log_password" placeholder="Kata Sandi" required />
            <div class="remember">
                <input type="checkbox" id="remember" />
                <label for="remember">Ingat Saya</label>
            </div>
            <a href="#">Lupa Kata Sandi?</a>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Selamat Datang Kembali!</h1>
                <p>Masukkan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                <button class="hidden" id="login">Masuk</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Selamat Datang di Averess</h1>
                <p>Daftarkan dengan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                <button class="hidden" id="register">Daftar</button>
            </div>
        </div>
    </div>
</div>

<script>
  const container = document.getElementById('container');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  if (registerBtn && loginBtn && container) {
    registerBtn.addEventListener('click', () => {
      container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
      container.classList.remove("active");
    });
  }
</script>

</body>
</html>
