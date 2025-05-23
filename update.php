<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$genre = $_POST['genre'];

if ($_FILES['gambar']['name']) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $get = mysqli_query($conn, "SELECT gambar FROM upload WHERE id=$id");
    $data = mysqli_fetch_assoc($get);
    unlink("uploads/" . $data['gambar']);

    move_uploaded_file($tmp, "uploads/" . $gambar);
    mysqli_query($conn, "UPDATE upload SET judul='$judul', deskripsi='$deskripsi', genre='$genre', gambar='$gambar' WHERE id=$id");
} else {
    mysqli_query($conn, "UPDATE upload SET judul='$judul', deskripsi='$deskripsi', genre='$genre' WHERE id=$id");
}

header("Location: profile.php");
?>
