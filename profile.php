<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "averess";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";

if (!empty($search)) {
    $sql = "SELECT * FROM upload 
            WHERE judul LIKE '%$search%' 
            OR deskripsi LIKE '%$search%' 
            OR genre LIKE '%$search%' 
            OR tag LIKE '%$search%' 
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM upload ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="profile.css" />
  <link rel="stylesheet" href="explor.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
  <title>Profile - Averess</title>
  <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <nav style="display: flex; align-items: center; gap: 15px;">
    <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;" /></a>
    <a href="dashboard2.php">Beranda</a>
    <a href="explor.php">Jelajahi</a>
    <a href="create.php">Buat</a>
    <form action="profile.php" method="GET" style="flex: 1; display: flex; justify-content: center;">
      <input type="text" name="search" id="searchInput" class="search" placeholder="Cari judul, tag, genre..." value="<?= htmlspecialchars($search) ?>" style="width: 100%; max-width: 900px; padding: 10px 15px; border-radius: 20px; border: 1px solid #ccc; font-size: 16px; box-sizing: border-box;" />
    </form>
    <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
    <a href="#" class="icon" id="message-icon"><i class="fas fa-comment-dots"></i></a>
    <a href="profile.php" class="active"><img src="botak.png" alt="User profile" id="profile" style="width: 60px; height: 35px;" /></a>
  </nav>

  <div class="profile" id="profile">
    <img style="margin-left: 605px;" src="botak.png" alt="" >
    <h1 style="font-size:35px; font-weight: bold;">Clara</h1>
    <p class="title">claracelo</p>
    <p>100 mengikuti</p>
    <button class="button-profile">Bagikan</button>
    <button class="button-profile">Edit profile</button>
  </div>

  <div class="tabs">
    <div class="tab">
      <span class="active">Dibuat</span>
      <span>Disimpan</span>
    </div>
    <div class="tab-content">
      <?php if (!empty($search)): ?>
        <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($search) ?></strong></p>
      <?php endif; ?>

      <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="upload-grid">
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="upload-item">
              <div class="content-card">
                <img src="uploads/<?= $row['gambar'] ?>" alt="<?= $row['judul'] ?>">
                <h3><?= $row['judul'] ?></h3>
                <p><strong>Deskripsi:</strong> <?= $row['deskripsi'] ?></p>
                <div class="genre"><strong>Genre:</strong> <?= $row['genre'] ?></div>
                <div class="tag">
                  <strong>tag:</strong>
                  <?= !empty($row['tag']) ? htmlspecialchars($row['tag']) : '<em>Tidak ada tag</em>'; ?>
                </div>
                <div class="actions">
                  <a href="create.php?action=edit&id=<?= $row['id'] ?>" class="text-blue-600 hover:underline mr-3">Edit</a>
                  <a href="create.php?action=delete&id=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus konten ini?')">Hapus</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <p>Tidak ada hasil yang ditemukan.</p>
        <a href="create.php"><button class="create-pin-button">Buat Foto</button></a>
      <?php endif; ?>
    </div>
  </div>

  <footer>
    <div class="row">
      <div class="col" id="company">
        <img src="AA brandmark.jpg" alt="" class="logo" />
        <p>Kami mengkhususkan diri dalam merancang, menjadikan bisnis Anda merek. Coba layanan premium kami.</p>
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
          <a href="#">Ilustrasi</a>
          <a href="#">Materi iklan</a>
          <a href="#">Desain Poster</a>
          <a href="#">Desain Kartu</a>
        </div>
      </div>
      <div class="col" id="useful-links">
        <a style="text-decoration: none;" href="aboutus.html"><h3>Tentang Kami</h3></a>
        <div class="links">
          <a href="#">Tautan</a>
          <a href="#">Layanan</a>
          <a href="#">Kebijakan kami</a>
          <a href="#">Bantuan</a>
        </div>
      </div>
      <div class="col" id="contact">
        <a style="text-decoration: none;" href="contackus.html"><h3>Kontak Kami</h3></a>
        <div class="contact-details">
          <i class="fa fa-location"></i>
          <p>Buah Batu, <br />Bandung, INDONESIA</p>
        </div>
        <div class="contact-details">
          <i class="fa fa-phone"></i>
          <p>(021) 21031032</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    const searchInput = document.getElementById("searchInput");
    let typingTimer;
    searchInput.addEventListener("keyup", function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(() => {
        const keyword = searchInput.value.trim();
        if (keyword.length > 1) {
          window.location.href = "profile.php?search=" + encodeURIComponent(keyword);
        }
      }, 600);
    });
  </script>
</body>
</html>

<?php mysqli_close($conn); ?>
