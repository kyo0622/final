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
        
		<title>書籍管理システム</title>
	</head>
	<body>
        <h1>カテゴリー一覧</h1>
        <hr>
        <button onclick="location.href='toroku_category.php'">カテゴリーを登録する</button>
        
        <table><tr><th>カテゴリーID</th><th>カテゴリー名</th><th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Category') as $row) {
        echo '<tr>';
        echo '<td>', $row['category_id'], '</td>';
        echo '<td>', $row['category_name'], '</td>';
        echo '<td>';
        echo '<form action="edit_category.php" method="post">';
        echo '<input type="hidden" name="category_id" value="', $row['category_id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete_category.php" method="post">';
        echo '<input type="hidden" name="category_id" value="',$row['category_id'],'">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    <button onclick="location.href='index.html'">トップへ戻る</button>
</body>
</html>