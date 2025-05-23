<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM upload WHERE id=$id"));
?>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required>
    <textarea name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
    <select name="genre">
        <option value="Animal" <?php if($data['genre'] == 'Animal') echo 'selected'; ?>>Animal</option>
        <option value="Nature" <?php if($data['genre'] == 'Nature') echo 'selected'; ?>>Nature</option>
        <option value="Urban" <?php if($data['genre'] == 'Urban') echo 'selected'; ?>>Urban</option>
        <!-- Tambah genre lain sesuai kebutuhan -->
    </select>
    <p>Gambar saat ini:</p>
    <img src="uploads/<?php echo $data['gambar']; ?>" width="100">
    <input type="file" name="gambar">
    <button type="submit">Update</button>
</form>
