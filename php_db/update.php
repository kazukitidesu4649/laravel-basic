<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';


if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO($dsn, $user, $password);

        $sql = '
            UPDATE users
            SET name = :name,
            furigana = :furigana,
            email = :email,
            age = :age,
            address = :address
            WHERE id = :id
        ';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $_POST['user_name'], PDO::PARAM_STR);
        $stmt->bindValue(':furigana', $_POST['user_furigana'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['user_email'], PDO::PARAM_STR);
        $stmt->bindValue(':age', $_POST['user_age'], PDO::PARAM_STR);
        $stmt->bindValue(':address', $_POST['user_address'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);


        $stmt->execute();
        header('Location: users.php');
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

if (isset($_GET['id'])) {
    try {
      $pdo = new PDO($dsn, $user, $password);
      $sql = 'SELECT * FROM users WHERE id = :id';
      $stmt = $pdo->prepare($sql);

      $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user == FALSE) {
        exit('idパラメータの値が不正です。');
    }
  } catch (PDOException $e) {
      exit($e->getMessage());
    }
} else {
  exit('idパラメータの値が存在しません。');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>ユーザー更新</h1>
    <p>更新する内容を入力してください。</p>
    <form action="update.php?id=<?= $_GET['id'] ?>" method="post">

        <div>
              <label for="user_name">お名前<span>【必須】</span></label>
              <input type="text" id="user_name" name="user_name" value="<?= $user['name'] ?>" maxlength="60" required>

              <label for="user_furigana">ふりがな<span>【必須】】</span></label>
              <input type="text" id="user_furigana" name="user_furigana" value="<?= $user['furigana'] ?>" maxlength="60" required>

              <label for="user_email">メールアドレス<span>【必須】】</span></label>
              <input type="email" id="user_email" name="user_email" value="<?= $user['email'] ?>" maxlength="255" required>
              
              <label for="user_age">年齢<span></span></label>
              <input type="number" id="user_age" name="user_age" value="<?= $user['age'] ?>"  min="13" max="130">

              <label for="user_address">住所<span></span></label>
              <input type="text" id="user_address" name="user_address" value="<?= $user['address'] ?>" maxlength="255">
            </div>
        <button type="submit" name="submit" value="update">更新</button>
    </form>
</body>
</html>