<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>
    <form action="<?=ROOT?>control/savearticle" method="post">
    	<p>Заголовок: <input type="text" name="title"></p>
    	<p>Текст: <input type="text" name="text"></p>
    	<p>Авторы: <input type="text" name="autors"></p>
    	<button type="submit">Добавить сообщение</button>
    </form>
</body>
</html>