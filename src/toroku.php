<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516819-final';
    const USER = 'LAA1516819';
    const PASS = 'Pass0622';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style2.css">
    <title>書籍登録</title>
</head>
<body>
    <h1>書籍を追加します。</h1>
    <form action="torokuoutput.php" method="post">
    <p>カテゴリー<br><select name="category_id">
    <?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Category') as $row) {
        echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
    }
    ?>
    </select><br>
    書籍名<br><input type="text" name="book_name"><br>
    著者<br><input type="text" name="book_author"></p>
        <h3><button type="submit">登録</button></h3>
    </form>
    <h4><button type="submit" onclick="history.back()" name="modo" value="back">戻る</button></h4>
</body>
</html>