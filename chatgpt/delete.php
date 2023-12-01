<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 데이터베이스 연결 설정
  $servername = "localhost";
  $username = "lapi";
  $password = "1234";
  $dbname = "test";

  // POST 데이터 가져오기
  $number = $_POST['number'];

  // 데이터베이스에 연결
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // DELETE 쿼리 실행
  $sql = "DELETE FROM posts WHERE number = $number";

  if ($conn->query($sql) === TRUE) {
    echo "글이 삭제되었습니다.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
