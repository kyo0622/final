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
		<title>更新画面</title>
		<link rel="stylesheet" href="css/style2.css">
	</head>
	<body>
    
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Book INNER JOIN Category ON Book.category_id = Category.category_id where book_id=?');
	$sql->execute([$_POST['book_id']]);
	foreach ($sql as $row) {
		echo '<form action="update.php" method="post">';
		echo '<p>書籍ID</p>';
		echo '<input type="text" name="book_id" value="', $row['book_id'], '">';
		echo '<p>書籍名</p>';
		echo '<input type="text" name="book_name" value="', $row['book_name'], '">';
		echo '<p>著者</p>';
		echo '<input type="text" name="book_author" value="', $row['book_author'], '">';
	}
	echo '<p>カテゴリー</p>';
	echo '<select name="category_id">';
		foreach ($pdo->query('select * from Category') as $row) {
		echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
		}
		echo '</select>';
		echo '<br><input type="submit" value="更新"><br>';
		echo '</form>';
?>
</table>
<br><button onclick="location.href='detail.php'">書籍一覧へ戻る</button>
</body>
</html>

