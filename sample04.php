<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample03</title>
</head>
<body>
<?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
    $message = "フォームからのメモです";
    $stmt = $db->prepare('insert into memos(memo) values(?, ?)');
    // ユーザーが入力したデータを受け取りたいときはprepareを使う
    if (!$stmt):
        die($db->error);
        // dieはエラーを表示して処理を終わらせるという指定
    endif;
    $stmt ->bind_param('si', $message, $val02);
    // prepareの?にどいう値(integerやstrings)の何を入れるかを指定する(複数の時はsiなど連続で指定も可能)
    $ret = $stmt->execute();
    // executeはこの処理をsqlで実行するという指示
    if ($ret) {
        echo 'データを挿入しました';
    } else {
        echo $db->error;
    }
?>
</body>
</html>