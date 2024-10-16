<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {
  $pdo = new PDO($dsn, $user, $password);

        if (isset($_GET['keyword'])) {
          $keyword = $_GET['keyword'];
        } else {
          $keyword = null;
        }
        
        //動的に変わる値をプレースホルダに置き換えたSELECT文をあらかじめ用意する
        $sql = 'SELECT name, furigana FROM users WHERE furigana LIKE :keyword';
        $stmt = $pdo->prepare($sql);

        $partial_match = "%{$keyword}%";

        $stmt->bindValue(':keyword', $partial_match, PDO::PARAM_STR);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e->getMessage());
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
    <form action="where-like.php" method="get" class="search-form">
        <input type="text" placeholder="ふりがなで検索" name="keyword">
        <input type="submit" value="検索">
      </form>

    <table>
         <tr>
             <th>氏名</th>
             <th>ふりがな</th>
         </tr>
         <?php
         // 配列の中身を順番に取り出し、表形式で出力する
         foreach ($results as $result) {
             echo "<tr><td>{$result['name']}</td><td>{$result['furigana']}</td></tr>";
         }
         ?>
     </table>
</body>
</html>