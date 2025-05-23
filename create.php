<?php
// Database Configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'averess';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create uploads directory if it doesn't exist
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Handle CRUD Operations
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? 0;

// Create/Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $conn->real_escape_string($_POST['judul']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $genre = $conn->real_escape_string($_POST['genre']);
    $tag = $conn->real_escape_string($_POST['tag']);

    if ($action === 'edit' && $id > 0) {
        // Update existing record
        if (!empty($_FILES['gambar']['name'])) {
            $oldFile = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
            if (file_exists("uploads/$oldFile")) {
                unlink("uploads/$oldFile");
            }
            $gambar = basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/$gambar");
        } else {
            $gambar = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
        }

        $sql = "UPDATE upload 
                SET gambar='$gambar', judul='$judul', deskripsi='$deskripsi', genre='$genre', tag='$tag' 
                WHERE id=$id";
    } else {
        // Create new record
        $gambar = basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/$gambar");

        $sql = "INSERT INTO upload (gambar, judul, deskripsi, genre, tag) 
                VALUES ('$gambar', '$judul', '$deskripsi', '$genre', '$tag')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: create.php?success=1");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
if ($action === 'delete' && $id > 0) {
    $file = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
    if (file_exists("uploads/$file")) {
        unlink("uploads/$file");
    }
    $conn->query("DELETE FROM upload WHERE id = $id");
    header("Location: create.php?success=1");
    exit();
}

// Get data for edit
if ($action === 'edit' && $id > 0) {
    $editData = $conn->query("SELECT * FROM upload WHERE id = $id")->fetch_assoc();
}

// Get all records for listing
$result = $conn->query("SELECT * FROM upload ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create - Averess</title>
  <link rel="icon" href="AA brandmark.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="create.css" />
  <link rel="stylesheet" href="profile.css" />
  <link rel="stylesheet" href="cobacoba2.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"/>
</head>
<body>
  <nav>
    <a href="#"><img class="logo" src="AA brandmark.jpg" alt="Averess logo" style="width: 50px; height: 50px;" /></a>
    <a href="dashboard2.php">Beranda</a>
    <a href="explor.php">Jelajahi</a>
    <a href="create.php" class="active">Buat</a>
    <input type="text" class="search" placeholder="Search" style="max-width: 900px; padding: 10px 15px; border-radius: 20px;"/>
    <a href="#" class="icon"><i class="fas fa-bell"></i></a>
    <a href="#" class="icon"><i class="fas fa-comment-dots"></i></a>
    <a href="profile.php"><img src="botak.png" alt="User profile" style="width: 60px; height: 35px;" /></a>
  </nav>

  <div class="container">
    <h1><?= $action === 'edit' ? 'Edit' : 'Tambah' ?> Upload</h1>

    <?php if (isset($_GET['success'])): ?>
      <div class="success">Data berhasil disimpan!</div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar" style="width: auto;" <?= $action !== 'edit' ? 'required' : '' ?>>
        <?php if ($action === 'edit'): ?>
          <p>Gambar saat ini: <img src="uploads/<?= $editData['gambar'] ?>" alt="Current Image" style="width: 100px;"></p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="<?= $editData['judul'] ?? '' ?>" required style="width: auto;">
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required><?= $editData['deskripsi'] ?? '' ?></textarea>
      </div>

      <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?= $editData['genre'] ?? '' ?>" required style="width: auto;">
      </div>

      <div class="form-group">
        <label for="tag">Tag:</label>
        <input type="text" name="tag" id="tag" value="<?= $editData['tag'] ?? '' ?>" required style="width: auto;">
      </div>

      <button type="submit">Simpan</button>
      <a href="profile.php">Back</a>
    </form>
  </div>

  
  <footer>
    <div class="row">
      <div class="col" id="company">
        <img src="AA brandmark.jpg" class="logo" />
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
        <a href="ourservices.html"><h3>Layanan Kami</h3></a>
        <div class="links">
          <a href="#">Ilustrasi</a>
          <a href="#">Materi iklan</a>
          <a href="#">Desain Poster</a>
          <a href="#">Desain Kartu</a>
        </div>
      </div>
      <div class="col" id="useful-links">
        <a href="aboutus.html"><h3>Tentang Kami</h3></a>
        <div class="links">
          <a href="#">Tautan</a>
          <a href="#">Layanan</a>
          <a href="#">Kebijakan kami</a>
          <a href="#">Bantuan</a>
        </div>
      </div>
      <div class="col" id="contact">
        <a href="contackus.html"><h3>Kontak Kami</h3></a>
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
    <div class="row">
      <div class="form">
        <form>
          <input type="text" placeholder="Ketik Email..." />
          <button><i class="fa fa-paper-plane"></i></button>
        </form>
      </div>
    </div>
  </footer>
</body>
</html>

<?php $conn->close(); ?>
