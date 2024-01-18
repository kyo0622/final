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

    <title>登録完了画面</title>
</head>
<body>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('insert into Book(category_id,book_name,book_author)values(?,?,?)');
    if(empty($_POST['category_id'])) {
        echo 'カテゴリーIDを入力してください。';
    }else if(empty($_POST['book_name'])) {
        echo '書籍名を入力してください。';
    }else if(empty($_POST['book_author'])) {
        echo '著者を入力してください。';
    }else if($sql->execute([$_POST['category_id'],$_POST['book_name'],$_POST['book_author']])) {
        echo '<font color="red">追加に成功しました。</font>';
    }else{
        echo '<font color="red">追加に失敗しました。</font>';
    }
?>
    <br><hr><br>
    <table>
    <tr><th>書籍番号</th><th>カテゴリー</th><th>書籍名</th><th>著者</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Book') as $row) {
        echo '<tr>';
        echo '<td>', $row['book_id'], '</td>';
        echo '<td>', $row['category_id'], '</td>';
        echo '<td>', $row['book_name'], '</td>';
        echo '<td>', $row['book_author'], '</td>';
        echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
    <button onclick="location.href='detail.php'">トップへ戻る</button>
</body>
</html>