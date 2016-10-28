<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>
    <form action="<?=ROOT?>control/saveannounce" method="post">
    	<p>Заголовок: <input type="text" name="title"></p>
    	<p>Текст: <input type="text" name="text"></p>
    	<p>Дата актуальности: <input type="date" name="actuality"></p>
    	<button type="submit">Добавить сообщение</button>
    </form>
</body>
</html>