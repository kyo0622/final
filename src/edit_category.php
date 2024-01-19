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
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
    <table>
    <tr><th>カテゴリーID</th><th>カテゴリー名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Category where category_id=?');
	$sql->execute([$_POST['category_id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update_category.php" method="post">';
		echo '<td>';
		echo '<input type="text" name="category_id" value="', $row['category_id'], '">';
		echo '<br></td> ';
		echo '<td>';
		echo '<input type="text" name="category_name" value="', $row['category_name'], '">';
		echo '<br></td> ';
		echo '<td><input type="submit" value="更新"><br></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='category.php'">カテゴリー一覧へ戻る</button>
    </body>
</html>

