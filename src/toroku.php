<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>書籍登録</title>
</head>
<body>
    <h1>書籍を追加します。</h1>
    <form action="torokuoutput.php" method="post">
    <p>1→絵本,2→小説,3→漫画,4→エッセイ</p>
    <p>カテゴリーID<br><input type="text" name="category_id"><br>
    書籍名<br><input type="text" name="book_name"><br>
    著者<br><input type="text" name="book_author"></p>
        <h3><button type="submit">登録</button></h3>
    </form>
    <h4><button type="submit" onclick="history.back()" name="modo" value="back">戻る</button></h4>
</body>
</html>