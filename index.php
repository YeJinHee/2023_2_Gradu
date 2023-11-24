<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">
</head>
<body>
    <form action="login.php" method="post"> 
        <h2>대림대학교</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
        <input type="text" name="uname" placeholder="객실 번호" class='active-border'><br>
        <input type="password" name="password" placeholder="비밀번호" class='active-border'><br>
        <button type="submit">로그인</button>
        <br><br><a href="signup.php" class="ca">회원가입</a>
    </form>

    <div class="footer">
        <p class="copyright">ⓒ 2023 대림 테크페어 스마트팩토리학부 캡스톤디자인 우수작품</p>
    </div>
</body>
</html>
