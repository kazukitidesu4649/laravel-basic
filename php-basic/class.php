<!DOCTYPE html>
<html lang="ja">

<head>
      <meta charset="UTF-8">
      <title>PHP基礎編</title>
</head>

<body>
        <p>
          <?php

            //クラスを定義する
            class Product {
              public $name;

              //メソッドを定義
              public function set_name($name) {
                $this->name = $name;
              }
              public function show_name() {
                echo $this->name . '<br>';
              }
            }

            //インスタンス化する
            $coffee = new Product();

            //メソッドにアクセスして実行する
            $coffee->set_name('コーヒー');
            $coffee->show_name();

            //インスタンス化
            $shampo = new Product();

            //プロパティにアクセスし、値を代入する
            $shampo->name = "シャンプー";

            //プロパティにアクセスし、値を出力する
            echo $shampo->name;
          ?>
        </p>
        <p>
            <?php
              //クラスを定義する
              class User {
                private $name;
                private $age;
                private $gender;

                //コンストラクトの定義
                public function __construct(string $name, int $age, string $gender) {
                  $this->name = $name;
                  $this->age = $age;
                  $this->gender = $gender;
                }
              }

              //インスタンス化する
              $user = new User('侍太郎' , 36 , '男性');

              //インスタンス$userの各プロパティの値を出力する
              print_r($user);
            ?>
        </p>
</body>
</html>