<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "lapi";
$password = "1234";
$dbname = "test";

// 데이터베이스에 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SELECT 쿼리 실행
$sql = "SELECT * FROM posts ORDER BY datetime DESC";
$result = $conn->query($sql);

$posts = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $post = array(
      'number' => $row['number'],
      'datetime' => $row['datetime'],
      'title' => $row['title'],
      'content' => $row['content']
    );
    array_push($posts, $post);
  }
}

echo json_encode($posts);

$conn->close();
?>
