<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample02</title>
</head>
<body>
<?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
    $records = $db->query('select count(*) as cnt from my_items');
    if ($records) {
        while ($record = $records->fetch_assoc()) {
        // fetchは1つずつデータを取り出すこと、assocは連想配列としての意味([]のキーを指定して出力する)
            echo $record['cnt']. '<br>';
        }
    } else {
        echo $db->error;
    }
?>
</body>
</html>