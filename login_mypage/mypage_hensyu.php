<?php
mb_internal_encoding("utf8");

session_start();

if (isset($_SESSION['from_mypage'])){
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
  
    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>
        
        <main>
            <h1>会員情報</h1>
            <p>こんにちは！ <?php echo $_SESSION['name']; ?>さん</p>
            
            <div class="left">
                <img src="<?php echo $_SESSION['picture']; ?>">
            </div>
            
            
            <form action="mypage_update.php" method="post">
                <div class="right">
                    <div class="name">
                        <label>氏名：</label>
                        <input type="text" class="formbox" size="40" name="name" required value="<?php echo $_SESSION['name']; ?>">
                        <br>
                    </div>
        
                    <div class="mail">
                        <label>メール：</label>
                        <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php echo $_SESSION['mail']; ?>">
                        
                    </div>
                    <div class="password">
                        <label>パスワード：</label>
                        <input type="text" class="formbox" size="40" name="password" pattern="^[a-zA-Z0-9]{6,}$" required value="<?php echo $_SESSION['password']; ?>">
                    </div>
                
                </div>
                
                <div class="bottom">
                    <div class="comments">
                        <textarea rows="5" cols="100" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
                    </div>
                    <input type="submit" class="button" value="この内容に変更する"/>  
                </div>    
            </form>        
        </main>
        
        <footer>
            ©2018 InterNous.inc. All rights reserved
        </footer>
    </body>
</html>