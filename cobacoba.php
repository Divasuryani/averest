<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "zaki";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil semua data upload dari tabel upload
$sql = "SELECT * FROM upload ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="explor.css"  />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Profile - Averess</title>
    <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .upload-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .upload-item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .upload-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .upload-content {
            padding: 15px;
        }
        .upload-content h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
        }
        .upload-content p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        .upload-genre {
            display: inline-block;
            background: #f0f0f0;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-top: 10px;
        }
        .no-data-message {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }
    </style>
  </head>
  <body>
    <nav>
        <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;"/></a>
        <a href="dashboard2.html">Beranda</a>
        <a href="explor.html">Jelajahi</a>
        <a href="create.php">Buat</a>
        <input type="text" class="search" placeholder="Search" style="width: 100%; max-width: 900px; padding: 10px 15px; border-radius: 20px; border: 1px solid #ccc; font-size: 16px; box-sizing: border-box;" />
        <a href="#" class="icon" id="bell-icon"><i class="fas fa-bell"></i></a>
        <a href="#" class="icon" id="message-icon"><i class="fas fa-comment-dots"></i></a>
        <a href="profil.php" class="active"><img src="botak.png" alt="User profile" id="profile" style="width: 60px; height: 35px;"/></a>
      </nav>
    <div class="profile" id="profile">
        <img src="botak.png" alt="" >
        <h1 style="font-size:35px; font-weight: bold; ">Clara</h1>
        <p class="title">claracelo</p>
        <p>0 mengikuti</p>
        <button class="button-profile">Bagikan</button>
        <button class="button-profile">Edit profile</button>
    </div>
    <div class="tabs">
      <div class="tab">
        <span class="active">Dibuat</span>
        <span>Disimpan</span>
      </div>
      <div class="tab-content">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="upload-grid">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="upload-item">
                        <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>">
                        <div class="upload-content">
                            <h3><?php echo $row['judul']; ?></h3>
                            <p><?php echo $row['deskripsi']; ?></p>
                            <span class="upload-genre"><?php echo $row['genre']; ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-data-message">
                <p>Belum ada data yang ditampilkan.</p>
            </div>
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
            </form>
          </div>
        </div>
    </footer>
  </body>
</html>
<?php mysqli_close($conn); ?>