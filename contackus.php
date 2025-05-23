<?php
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "root", "", "averest");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        $success = "Pesan berhasil dikirim!";
    } else {
        $success = "Terjadi kesalahan: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contack US - Averess</title>
    <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="explor.css" />
    <link rel="stylesheet" href="contackus.css" />
  </head>
  <body>
    <nav>
      <a href="#"><img class="logo" src="AA brandmark.jpg" alt="logo" /></a>
      <a href="dashboard2.html">Beranda</a>
      <a href="explor.html">Jelajahi</a>
      <a href="create.html">Buat</a>
      <input type="text" class="search" placeholder="Search" />
      <a href="#" class="icon"><i class="fas fa-bell"></i></a>
      <a href="#" class="icon"><i class="fas fa-comment-dots"></i></a>
      <a href="#" class="active"><img src="botak.png" alt="" /></a>
    </nav>

    <div class="contact-form">
      <h1>Kontak Kami</h1>
      <div class="container">
        <div class="main">
          <div class="content">
            <h2>Kontak Kami</h2>

            <?php if ($success): ?>
              <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>

            <form action="" method="post">
              <input type="text" name="name" placeholder="Masukkan Nama Anda" required />
              <input type="email" name="email" placeholder="Masukkan Email Anda" required />
              <textarea name="message" placeholder="Pesan Anda" required></textarea>
              <button type="submit" class="btn">
                Kirim <i class="fas fa-paper-plane"></i>
              </button>
            </form>
          </div>
          <div class="form-img">
            <section></section>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
