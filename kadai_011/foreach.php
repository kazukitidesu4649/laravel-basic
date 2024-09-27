<!doctype html>

<html lang="ja">

<head>
      <meta charset="UTF-8">
      <title>kadai_011</title>
</head>

<body>
    <p>
      <?php
        $vegitable_data = ['名前' => '玉ねぎ', '値段' => 200, '産地' => '北海道'];

        //$vegitable_dataを出力する
        foreach ($vegitable_data as $key => $value) {
          echo "{$key}:{$value}<br>";
        }
      ?>
    </p>  


</body>
</html>