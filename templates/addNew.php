<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>
    <form action="index.php?action=control&method=savenew" method="post">
    	<p>Заголовок: <input type="text" name="title"></p>
    	<p>Текст: <input type="text" name="text"></p>
    	<p>Источник: <input type="text" name="source"></p>
    	<button type="submit">Добавить сообщение</button>
    </form>
</body>
</html>