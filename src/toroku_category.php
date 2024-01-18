<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>カテゴリー登録</title>
</head>
<body>
    <h1>カテゴリーを追加します。</h1>
    <form action="torokuoutput_category.php" method="post">
    <p>
    カテゴリー名<br><input type="text" name="category_name"><br>
        <h3><button type="submit">登録</button></h3>
    </form>
    <h4><button type="submit" onclick="history.back()" name="modo" value="back">戻る</button></h4>
</body>
</html>