<?php
$successMessage = "";
$page = basename($_SERVER['PHP_SELF']); 


$host = "localhost";
$user = "root"; 
$pass = "";     
$dbname = "zaki";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = "Ayo gabung dan ngobrol bareng di Averess!";
        $body = "Hai! Saya ingin mengundang kamu untuk bergabung dan mulai ngobrol di Averess.\nKlik link berikut untuk mendaftar dan mulai: https://www.averess.com";
        $headers = "From: noreply@averess.com";

        if (mail($email, $subject, $body, $headers)) {
            
            $stmt = $conn->prepare("INSERT INTO invites (email) VALUES (?)");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();

            $successMessage = "Undangan berhasil dikirim ke $email..";
        } else {
            $successMessage =  "Undangan berhasil dikirim ke $email.";
        }
    } else {
        $successMessage = "Email tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Undang Teman</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Roboto', sans-serif; }
    body { background-color: #f9f9f9; padding-bottom: 50px; }
    nav { display: flex; align-items: center; background-color: white; padding: 10px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    nav a { text-decoration: none; margin-right: 20px; color: #333; font-weight: 500; }
    nav a.active { color: #e60023; }
    nav .search { flex: 1; padding: 8px 12px; border: 1px solid #ccc; border-radius: 20px; margin: 0 20px; }
    nav .icon { font-size: 20px; color: #333; margin-right: 15px; transition: color 0.3s; }
    nav .icon#message-icon { color: black; }
    nav .icon:hover { color: #e60023; }
    #profile { border-radius: 50%; width: 35px; height: 35px; }
    .invite-container, .share-section { max-width: 600px; margin: 40px auto; padding: 25px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .invite-box h2, .share-section h3 { margin-bottom: 15px; color: #333; }
    .invite-box form { display: flex; gap: 10px; margin-top: 10px; }
    .invite-box input[type="email"] { flex: 1; padding: 12px; border-radius: 8px; border: 1px solid #ccc; font-size: 14px; }
    .invite-box button { padding: 12px 20px; background-color: #e60023; color: white; border: none; border-radius: 8px; cursor: pointer; transition: background 0.3s; }
    .invite-box button:hover { background-color: #c1001b; }
    .success-message { margin-top: 15px; color: green; font-weight: 500; }
    .share-section ol { margin-top: 10px; margin-left: 20px; line-height: 1.6; color: #555; }
    .share-buttons { margin-top: 20px; display: flex; gap: 20px; }
    .share-buttons a { font-size: 28px; color: #555; transition: transform 0.2s, color 0.3s; }
    .share-buttons a:hover { transform: scale(1.1); color: #e60023; }
  </style>
</head>
<body>

  <nav>
    <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;"/></a>
    <a href="dashboard2.php" class="<?= ($page == 'dashboard2.php') ? 'active' : '' ?>">Beranda</a>
    <a href="explor.php" class="<?= ($page == 'explor.php') ? 'active' : '' ?>">Jelajahi</a>
    <a href="create.php" class="<?= ($page == 'create.php') ? 'active' : '' ?>">Buat</a>
    <input type="text" class="search" placeholder="Search" />
    <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
    <a href="#" class="icon <?= ($page == 'profile.php') ? 'active' : '' ?>" id="message-icon"><i class="fas fa-comment-dots"></i></a>
    <a href="profile.php"><img src="botak.png" alt="User profile" id="profile" /></a>
  </nav>

  <div class="invite-container">
    <div class="invite-box">
      <h2>Undang teman-teman Anda</h2>
      <p>Masukkan email teman untuk mulai mengobrol.</p>
      <form method="post" action="">
        <input type="email" name="email" placeholder="Email teman" required>
        <button type="submit">Undang</button>
      </form>
      <?php if ($successMessage): ?>
        <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="share-section">
    <h3>Temukan inspirasi bersama</h3>
    <ol>
      <li><strong>Bagikan tautan Anda:</strong> Teman harus klik tautan untuk mengikuti Anda.</li>
      <li><strong>Gunakan untuk banyak teman:</strong> Satu tautan bisa dipakai berulang.</li>
      <li><strong>Saling ikuti:</strong> Bisa berbagi ide dan pesan langsung.</li>
    </ol>

    <div class="share-buttons">
      <a href="https://api.whatsapp.com/send?text=Ayo%20gabung%20dan%20ngobrol%20di%20Averess!%20https://www.averess.com" target="_blank" title="Bagikan via WhatsApp">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="https://social-plugins.line.me/lineit/share?url=https://www.averess.com" target="_blank" title="Bagikan via LINE">
        <i class="fab fa-line"></i>
      </a>
      <a href="mailto:?subject=Averess&body=Gabung%20bareng%20saya%20di%20Averess:%20https://www.averess.com" title="Kirim via Email">
        <i class="fa fa-envelope"></i>
      </a>
      <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.averess.com" target="_blank" title="Bagikan di Facebook">
        <i class="fab fa-facebook"></i>
      </a>
    </div>
  </div>

</body>
</html>

<?php $conn->close(); ?>
