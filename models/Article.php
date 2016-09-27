<?php

class Article extends Publications {
	public $autors = '';
	public $rating = '';
	private $sumNote;

	public function add($title, $text, $autors) {
		$db = $this->connection();
		$newDate = date("Y-m-d");
		$db->query("INSERT INTO `publication` (`title`, `text`, `type`, `nowDate`) VALUES ('$title', '$text', 'article', '$newDate')");
		$textId = $db->query("SELECT `id` FROM `publication` WHERE `title` = '$title' AND `text` = '$text'");
		$str = $textId->fetch_assoc();
		$strId = $str['id'];
		$db->query("INSERT INTO `article` (`id`, `autors`) VALUES ('$strId', '$autors')");
	}

	public function checkNote($id, $note) {
		$db = $this->connection();
		$textNote = $db->query("SELECT `rating` FROM `article` WHERE `id` = '$id'");
		$strNote = $textNote->fetch_assoc();
		if ($strNote['rating'] == "" || $strNote['rating'] == 0) {
			$sumNote = $note;
		} else {
			$sumNote = round(($strNote['rating'] + $note) / 2, 3);
		}
		$db->query("UPDATE `article` SET `rating` = '$sumNote' WHERE `id` = '$id'");
		return $sumNote;
	}
}
