<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
    <?php
  // ソート関数の定義
  function sort_2way(&$array, $order) {

    // 昇順の場合
    if ($order) {
      // メッセージ表示
      echo '昇順にソートします<br>';

      // 配列を昇順にソート
      sort($array);
    }    
    // 降順の場合
    else {
      // メッセージ表示
      echo '降順にソートします<br>';

      // 配列を降順にソート
      rsort($array);
    }
  }

  // 配列の値を設定
  $nums = [15, 4, 18, 23, 10];

  // 配列を昇順にソート
  sort_2way($nums, true);

  // 配列の内容を表示
  foreach($nums as $num) {
    echo $num . '<br>'; 
  }

  // 配列を降順にソート
  sort_2way($nums, false);

  // 配列の内容を表示
  foreach($nums as $num) {
    echo $num . '<br>'; 
  }
?>

        
    </p>
</body>

</html>
