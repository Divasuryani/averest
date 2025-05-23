<?php
// Database Configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'zaki';

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
    
    if ($action === 'edit' && $id > 0) {
        // Update existing record
        if (!empty($_FILES['gambar']['name'])) {
            // Delete old file
            $oldFile = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
            if (file_exists("uploads/$oldFile")) {
                unlink("uploads/$oldFile");
            }
            
            // Upload new file
            $gambar = basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/$gambar");
        } else {
            $gambar = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
        }
        
        $sql = "UPDATE upload SET gambar='$gambar', judul='$judul', deskripsi='$deskripsi', genre='$genre' WHERE id=$id";
    } else {
        // Create new record
        $gambar = basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/$gambar");
        
        $sql = "INSERT INTO upload (gambar, judul, deskripsi, genre) VALUES ('$gambar', '$judul', '$deskripsi', '$genre')";
    }
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ?success=1");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
if ($action === 'delete' && $id > 0) {
    // Get file name first
    $file = $conn->query("SELECT gambar FROM upload WHERE id = $id")->fetch_assoc()['gambar'];
    
    // Delete file
    if (file_exists("uploads/$file")) {
        unlink("uploads/$file");
    }
    
    // Delete record
    $conn->query("DELETE FROM upload WHERE id = $id");
    header("Location: ?success=1");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CRUD</title>
    <link rel="stylesheet" href="cobacoba2.css">
</head>
<body>
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
                <input type="file" name="gambar" id="gambar" <?= $action !== 'edit' ? 'required' : '' ?>>
                <?php if ($action === 'edit'): ?>
                    <p>Gambar saat ini: <img src="uploads/<?= $editData['gambar'] ?>" alt="Current Image"></p>
                <?php endif; ?>
            </div>
            
            <div class="form-group" >
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?= $editData['judul'] ?? '' ?>" required>
            </div>
            
            <div class="form-group" >
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" required><?= $editData['deskripsi'] ?? '' ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select name="genre" id="genre" required>
                    <option value="Animal" <?= isset($editData) && $editData['genre'] === 'Animal' ? 'selected' : '' ?>>Animal</option>
                    <option value="Cars" <?= isset($editData) && $editData['genre'] === 'Cars' ? 'selected' : '' ?>>Cars</option>
                    <option value="Cartoon" <?= isset($editData) && $editData['genre'] === 'Cartoon' ? 'selected' : '' ?>>Cartoon</option>
                    <option value="Fashion" <?= isset($editData) && $editData['genre'] === 'Fashion' ? 'selected' : '' ?>>Fashion</option>
                    <option value="Mountain" <?= isset($editData) && $editData['genre'] === 'Mountain' ? 'selected' : '' ?>>Mountain</option>
                    <option value="MotorCycle" <?= isset($editData) && $editData['genre'] === 'MotorCycle' ? 'selected' : '' ?>>MotorCycle</option>
                    <option value="Bicycle" <?= isset($editData) && $editData['genre'] === 'Bicycle' ? 'selected' : '' ?>>Bicycle</option>
                </select>
            </div>
            
            <button type="submit">Simpan</button>
            <a href="profile.php">Back</a>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>