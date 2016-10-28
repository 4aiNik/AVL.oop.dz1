<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>

    <a href="<?=ROOT?>control/addnews">Добавить новость</a>
    <a href="<?=ROOT?>control/addannounce">Добавить объявление</a>
    <a href="<?=ROOT?>control/addarticle">Добавить статью</a>

    <ul>
        <?foreach($message as $mess):?>
        <li>
            <?if($mess['type'] == 'new'):?>
                заголовок новости: <?=$mess['title']?><br>
                текст: <?=$mess['text']?><br>
                дата: <?=$mess['nowDate']?><br>
                источник: <?=$mess['source']?>
            <?endif?>

            <?if($mess['type'] == 'announcement'):?>
                заголовок объявления: <?=$mess['title']?><br>
                текст: <?=$mess['text']?><br>
                дата публикации: <?=$mess['nowDate']?><br>
                дата актуальности: <?=$mess['actuality']?><br>
                <?if (date("Y-m-d") > $mess['actuality']):?><br>
                    <form action="<?=ROOT.'control/delannounce/'.$mess["id"]?>" method="post">
                        <button type="submit">удалить</button>
                    </form>
                <?endif?>
            <?endif?>

            <?if($mess['type'] == 'article'):?>
                заголовок статьи: <?=$mess['title']?><br>
                текст: <?=$mess['text']?><br>
                авторы: <?=$mess['autors']?><br>
                текущая оценка: <?=$mess['rating']?><br>
                <form action="<?=ROOT.'home/checkNote/'?>" method="post">
                    <input type='hidden' name='article' value="<?=$mess['id']?>"><p>
                    <input type='radio' name='rating' value='1'>1
                    <input type='radio' name='rating' value='2'>2
                    <input type='radio' name='rating' value='3'>3
                    <input type='radio' name='rating' value='4'>4
                    <input type='radio' name='rating' value='5'>5</p>
                    <button type='submit'>оценить статью</button>
                </form>
            <?endif?>
        </li>
        <?endforeach?>
    </ul>

    <form action="<?=ROOT.'control/sort/'?>" method="post">
    	<p>Фильтровать по: 
    	<select name='filter'>
    		<option selected="selected" value="1">Всем</option>
    		<option value="2">Новостям</option>
    		<option value="3">Объявлениям</option>
    		<option value="4">Статьям</option>
   		</select>

  		Сортировать по: 
    	<select name='sort'>
    		<option selected="selected" value="1">Времени написания</option>
    		<option value="2">Заголовку</option>
   		</select>
   		<input type="submit" value="Отправить"></p>
  	</form>
</body>
</html>