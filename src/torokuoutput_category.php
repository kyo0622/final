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
    $sql=$pdo->prepare('insert into Category(category_name)values(?)');
    if(empty($_POST['category_name'])) {
        echo 'カテゴリー名を入力してください。';
    }else if($sql->execute([$_POST['category_name']])) {
        echo '<font color="red">追加に成功しました。</font>';
    }else{
        echo '<font color="red">追加に失敗しました。</font>';
    }
?>
    <br><hr><br>
    <table>
    <tr><th>カテゴリーID</th><th>カテゴリー名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Category') as $row) {
        echo '<tr>';
        echo '<td>', $row['category_id'], '</td>';
        echo '<td>', $row['category_name'], '</td>';
        echo '<td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
    <button onclick="location.href='category.php'">カテゴリー一覧へ戻る</button>
</body>
</html>