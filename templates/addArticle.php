<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>
    <form action="index.php?action=control&method=savearticle" method="post">
    	<p>Заголовок: <input type="text" name="title"></p>
    	<p>Текст: <input type="text" name="text"></p>
    	<p>Авторы: <input type="text" name="autors"></p>
<!--     	<p>Оценка:
    	<input type="radio" name="rating" value="1">1
    	<input type="radio" name="rating" value="2">2
    	<input type="radio" name="rating" value="3">3
    	<input type="radio" name="rating" value="4">4
    	<input type="radio" name="rating" value="5">5</p> -->
    	<button type="submit">Добавить сообщение</button>
    </form>
</body>
</html>