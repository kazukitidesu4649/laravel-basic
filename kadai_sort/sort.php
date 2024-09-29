<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
    <?php
    //sort_2wayの定義
    function sort_2way($array, $order){
      if($order){
        echo '昇順にソートします。<br>';
        sort($array);
      } else {
        echo '降順にソートします。<br>';
        rsort($array);
      }
      foreach($array as $ary) {
        echo $ary . '<br>';
      }
    }

    //array関数に値を代入
    $array = [15, 4, 18, 23, 10];

    //sort_2wayの起動
    sort_2way($array, true);
    sort_2way($array, false);
    ?>
    </p>
</body>

</html>
