<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP + DB</title>
</head>

<body>
    <p>
      <?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = 'root';

        try {
          $pdo = new PDO($dsn, $user, $password);

          $sql = 'CREATE TABLE IF NOT EXISTS users (
              id int(11) not null auto_increment primary key,
              name varchar(60) not null,
              furigana varchar(60) not null,
              email varchar(255) not null,
              age int(11),
              address varchar(255)
          )';

          $pdo->query($sql);
        } catch (PDOException $e) {
          exit(''. $e->getMessage());
        }
      ?>
    </p>
</body>
</html>