<?php
  include 'CI/db_conn_web.php';
  // 보안 수준 향상 필요
  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if($_SESSION['user_name'] !== 'admin'){
      header("Location: index.php");
      exit();  
    }
  }else {
    header("Location: index.php");
    exit();
  }
?>
<?php
  //db 데이터 수정
  function dbUpdateData($connection, $table ,$field, $value) {
      $user_name = $_POST['room_number'];

      // SQL UPDATE 문 작성
      $updateSql = "UPDATE $table SET $field = :value WHERE user_name = :user_name";
      // SQL 문을 데이터베이스에 바인딩 및 실행
      $updateStmt = $connection->prepare($updateSql);
      $updateStmt->bindParam(':value', $value);
      $updateStmt->bindParam(':user_name', $user_name);
      $updateStmt->execute();
  }
  
  if (isset($_POST['ROOMIDCHANGE'])) {
    if(isset($_POST['room_number'])){
      dbUpdateData($connection, 'users', 'password', '0000');
      echo "<script>alert('0000으로 설정되었습니다.');</script>";
    }
  }

  if (isset($_POST['DOORPWCHANGE'])) {
    if(isset($_POST['room_number'])){
      dbUpdateData($connection, 'userManagement', 'pw', '0000');
      echo "<script>alert('0000으로 설정되었습니다.');</script>";
    }
  }

  if (isset($_POST['RESETID'])) {
    if(isset($_POST['room_number'])){
      dbUpdateData($connection, 'userManagement', 'reset', '1');
      echo "<script>alert('도어락을 재시작하시면 초기화됩니다.');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminPage</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styleAdmin.css">  
</head>
<body>
    <h2>관리자 계정</h2>
    <form id="myForm" method="POST">
        <input type="text" id="room_number" name="room_number" required pattern="\d{4}" placeholder="방 번호를 입력해주세요"
        title="네 자리 숫자로 입력하세요">
        <div class="button-container">
            <button type="submit" name="ROOMIDCHANGE">로그인 비밀번호 변경</button>
            <button type="submit" name="DOORPWCHANGE">도어락 비밀번호 변경</button>
            <button type="submit" name="RESETID">계정 초기화</button>
        </div>
        <br>
        <a href="logout.php" class="logout-link">로그아웃</a>
    </form> 
    <script src="js/common_function.js"></script>
</body>
</html>