<?php
//セッションスタート
session_start();

//POSTリクエストから入力データを取得
$user_name = $_POST['user_name'];
$user_age = $_POST['user_age'];
$category = $_POST['category'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
      <meta charset="utf-8">
      <title>kadai_web_app</title>  
</head>

<body>
      <h2>入力内容をご確認ください。</h2>
      <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>

      <table border=double>
      <tr>
          <td>社員名</td>
          <td><?php echo $user_name; ?></td>
      </tr>
      <tr>
          <td>年齢</td>
          <td><?php echo $user_age; ?></td>
      </tr>
      <tr>
          <td>所属部署</td>
          <td><?php echo $category; ?></td>
      </tr>
      </table>
      <p>
        <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cancel-btn" onclick="history.back();">キャンセル</button>
    </p>
</body>
</html>