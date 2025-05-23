<?php
include 'koneksi.php';

$id = $_GET['id'];
$get = mysqli_query($conn, "SELECT gambar FROM upload WHERE id=$id");
$data = mysqli_fetch_assoc($get);
unlink("uploads/" . $data['gambar']);

mysqli_query($conn, "DELETE FROM upload WHERE id=$id");
header("Location: profile.php");
?>
