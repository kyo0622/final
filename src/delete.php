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
		<title>削除画面</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Book where book_id=?');
    if($sql->execute([$_POST['book_id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
    <tr><th>書籍番号</th><th>カテゴリー</th><th>書籍名</th><th>著者</th><<th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Book') as $row) {
        echo '<tr>';
        echo '<td>', $row['book_id'], '</td>';
        echo '<td>', $row['category_id'], '</td>';
        echo '<td>', $row['book_name'], '</td>';
        echo '<td>', $row['book_author'], '</td>';
        echo '<td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
    <button onclick="location.href='detail.php'">トップへ戻る</button>
</body>
</html>