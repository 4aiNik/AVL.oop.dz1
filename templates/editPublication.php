<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>portal</title>
</head>
<body>
    <ul>

       <?php
        for ($i=0; $i<count($message); $i++) {
        	echo "<li>";
        	if ($message[$i]['type'] == 'new') {
        		echo "заголовок новости: ".$message[$i]['title']."<br>текст: ".$message[$i]['text']."<br>дата: ".$message[$i]['nowDate']."<br>источник: ".$message[$i]['source'];
        	}
        	if ($message[$i]['type'] == 'announcement') {
        		echo "заголовок объявления: ".$message[$i]['title']."<br>текст: ".$message[$i]['text']."<br>дата публикации: ".$message[$i]['nowDate']."<br>дата актуальности: ".$message[$i]['actuality']."<br>".$message[$i]['button'];
        	}
        	if ($message[$i]['type'] == 'article') {
        		echo "заголовок статьи: ".$message[$i]['title']."<br>
        		текст: ".$message[$i]['text']."<br>
        		авторы: ".$message[$i]['autors']."<br>
        		текущая оценка:".$message[$i]['rating']."<br>
        		<form action='index.php?action=home&method=checkNote' method='post'>
        			<input type='hidden' name='article' value=".$message[$i]['id']."><p>
        			<input type='radio' name='rating' value='1'>1
    				<input type='radio' name='rating' value='2'>2
    				<input type='radio' name='rating' value='3'>3
    				<input type='radio' name='rating' value='4'>4
    				<input type='radio' name='rating' value='5'>5</p>
    				<button type='submit'>оценить статью</button>
    			</form>";
        	}
        	echo "</li><br>";
        }
       ?>
    </ul>
    <a href="index.php?action=control&method=addnews">Добавить новость</a>
    <a href="index.php?action=control&method=addannounce">Добавить объявление</a>
    <a href="index.php?action=control&method=addarticle">Добавить статью</a>

    <form action="index.php?action=control&method=filter" method="post">
    	<p>Фильтровать по: 
    	<select name='filter'>
    		<option selected="selected" value="1">Всем</option>
    		<option value="2">Новостям</option>
    		<option value="3">Объявлениям</option>
    		<option value="4">Статьям</option>
   		</select>
   		<input type="submit" value="Отправить"></p>
  	</form>

  	<form action="index.php?action=control&method=sort" method="post">
  		<p>Сортировать по: 
    	<select name='sort'>
    		<option selected="selected" value="1">Времени написания</option>
    		<option value="2">Заголовку</option>
   		</select>
   		<input type="submit" value="Отправить"></p>
  	</form>
</body>
</html>