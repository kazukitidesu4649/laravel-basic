<!DOCTYPE html>
<html lang="ja">

<head>
      <meta charset="utf-8">
      <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
        $name= '侍太郎';
        $password = 12345678;
        $email = 'samuraitarou@example.com';
        $gender = '男性';

        //名前チェック
        if (empty($name)) {
          exit('氏名を入力して下さい。');
        }

        //パスワードチェック
        if (mb_strlen($password) < 8) {
          exit('パスワードは８文字以上にして下さい。');
        }

        //メールアドレスチェック
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          exit('メールアドレスの入力形式が正しくありません。');
        }

        //性別が指定されているか
        if (!in_array( $gender, ['男性' , '女性' , 'その他'])) {
          exit('正しい性別を指定してください。');
        }

        echo'バリデーションの結果、問題ありませんでした。';

        ?>
    </p>
</body>
</html>