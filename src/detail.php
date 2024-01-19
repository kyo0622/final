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
        <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
        <h1>書籍一覧</h1>
        <hr>
        <button onclick="location.href='toroku.php'">書籍を登録する</button>
        
        <table><tr><th>書籍番号</th><th>カテゴリー</th><th>書籍名</th><th>著者</th><th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Book INNER JOIN Category ON Book.category_id = Category.category_id') as $row) {
        echo '<tr>';
        echo '<td>', $row['book_id'], '</td>';
        echo '<td>', $row['category_name'], '</td>';
        echo '<td>', $row['book_name'], '</td>';
        echo '<td>', $row['book_author'], '</td>';
        echo '<td>';
        echo '<form action="edit.php" method="post">';
        echo '<input type="hidden" name="book_id" value="', $row['book_id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="book_id" value="',$row['book_id'],'">';
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