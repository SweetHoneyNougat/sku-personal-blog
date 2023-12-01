<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 데이터베이스 연결 설정
  $servername = "localhost";
  $username = "lapi";
  $password = "1234";
  $dbname = "test";

  // POST 데이터 가져오기
  $title = $_POST['title'];
  $content = $_POST['content'];

  // 데이터베이스에 연결
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // INSERT 쿼리 실행
  $datetime = date("Y-m-d H:i:s");
  $sql = "INSERT INTO posts (datetime, title, content) VALUES ('$datetime', '$title', '$content')";

  if ($conn->query($sql) === TRUE) {
    echo "글 작성이 완료되었습니다.";
    // posts.html로 이동
    echo "<script>window.location.href='posts.html';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
