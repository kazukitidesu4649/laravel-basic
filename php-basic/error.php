<!DOCTYPE html>
<html lang="ja">

<head>
      <meta charset="utf-8">
      <title>PHP基礎編</title>
</head>

<body>
        <p>
          <?php
          function myErrorHandler($errno, $errstr, $errfile, $errline) {
            error_log(  "[$errno] $errstr $errfile($errline)\n", 3, 'C:\MAMP\php\logs\error.log' );

            return TRUE;
          }

          set_error_handler('myErrorHandler');
          error_reporting(0);
          echo '全エラー無効' . '<br>';
          echo $dummy1;
          error_reporting(E_ALL);
          echo '全エラー有効';
          echo $dummy2;
          ?>
        </p>
</body>
</html>