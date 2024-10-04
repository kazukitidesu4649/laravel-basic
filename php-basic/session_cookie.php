<?php
session_start();

if (isset($_COOKIE['name'])){
  $user_name = $_COOKIE['name'];
} else{
  $user_name = '名無し';

  setcookie('name','侍太郎', time() +3600,);
  echo 'クッキーを追加します。有効期限は1時間です。';
}

if (isset($_SESSION[$user_name])){
  $_SESSION[$user_name]++;

  if ($_SESSION[$user_name] > 3 ) {
    setcookie('name','', time() - 100 );
  }
} else {
  $_SESSION[$user_name] = 1;
}

?>

<!doctype html>
<html lang="ja">

<head>
      <meta charset="utf-8">
      <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
        echo 'ようこそ'.$user_name.'さん'.$_SESSION[$user_name].'回目の訪問です';

        if ($_SESSION[$user_name] > 3) {
          echo 'セッションを終了します。';
          $_SESSION = array() ;
          session_destroy();
        }
        ?>
    </p>
</body>
</html>