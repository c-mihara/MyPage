<?php
session_start();
if(isset($_SESSION['id'])) {
    header("location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>
    
    <main>
        <form action="mypage.php" method="post">
        <div class="form_contents">

            <div class="mail">
                <label>メールアドレス</label><br>
                <input type="text" class="formbox" size="40" value="<?php echo $_COOKIE['mail'];?>" name="mail" required>
            </div>

            <div class="password">
                <label>パスワード</label><br>
                <input type="password" class="formbox" size="40" value="<?php echo $_COOKIE['password'];?>" name="password" required>
            </div>

            <div class="login">
                <input type="submit" class="login_button" value="ログイン">
            </div>
        </div>                           
        </form> 
    </main>
<footer>
©2018 InterNous.inc. All rights reserved
</footer>    
</body>

</html>