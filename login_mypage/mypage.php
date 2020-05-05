<?php
mb_internal_encoding("utf-8");
session_start();

if(empty($_SESSION['id'])) {

try {
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
} catch(PDOExeption $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>
        しばらくしてから再度ログインをしてください。</p>
        <a hreaf='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
       );
}
$stmt = $pdo -> prepare("select * from login_mypage where mail = ? && password = ?");

$stmt -> bindValue(1,$_POST["mail"]);
$stmt -> bindValue(2,$_POST["password"]);

$stmt -> execute();
$pdo = NULL;

while ($row = $stmt -> fetch()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['comments'] = $row['comments'];
}

if (empty ($_SESSION['id'])){
    header("Location:login_error.php");
}
    
}

setcookie('mail',$_SESSION['mail'],time()+60*60*24*7,'/');
setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/');
?>

<!DOCTYPE html>
<html lang="ja">

    <head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
  
    <body>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="logout">
                <a href="log_out.php">ログアウト</a>
            </div>
        </header>
        
        <main>
            <h1>会員情報</h1>
            <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>
            
            <div class="left">
                <img src="<?php echo $_SESSION['picture']; ?>">
            </div>
            
            <div class="right">
                <p class="name">氏名：<?php echo $_SESSION['name']; ?></p>
                <p class="mail">メール：<?php echo $_SESSION['mail']; ?></p>
                <p class="password">パスワード：<?php echo $_SESSION['password']; ?></p>
            </div>
            
            <div class="bottom">
                <p class="comments"><?php echo $_SESSION['comments']; ?></p>
            
            </div>
            
            <form action="mypage_hensyu.php" method="post" class="form_center">
                <input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
                <input type="submit" class="button" value="編集する"/>
            </form>

        </main>
        
        <footer>
            ©2018 InterNous.inc. All rights reserved
        </footer>
    </body>
</html>
    