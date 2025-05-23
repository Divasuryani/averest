<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "averess";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "
  SELECT tag_name, COUNT(*) as total
  FROM post_tags
  GROUP BY tag_name
  ORDER BY total DESC
  LIMIT 10
";

$result = $conn->query($sql);
$tags = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $tags[] = $row;
  }
}

header('Content-Type: application/json');
echo json_encode($tags);
?>
