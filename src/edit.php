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
		<title>商品更新画面</title>
	</head>
	<body>
    <table>
    <tr><th>書籍番号</th><th>カテゴリー</th><th>書籍名</th><th>著者</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Book where book_id=?');
	$sql->execute([$_POST['book_id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update.php" method="post">';
		echo '<td>';
		echo '<input type="text" name="book_id" value="', $row['book_id'], '">';
		echo '<br></td> ';
		echo '<td>';
		echo '<input type="text" name="category_id" value="', $row['category_id'], '">';
		echo '<br></td> ';
		echo '<td>';
		echo '<input type="text" name="book_name" value="', $row['book_name'], '">';
		echo '<br></td> ';
		echo '<td>';
		echo '<input type="text" name="book_author" value="', $row['book_author'], '">';
		echo '<br></td> ';
		echo '<td><input type="submit" value="更新"><br></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='detail.php'">トップへ戻る</button>
    </body>
</html>

