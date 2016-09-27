<?php
class News extends Publications {
	public $date = '';
	public $source = '';

	public function add($title, $text, $source) {
		$db = $this->connection();
		$newDate = date("Y-m-d");
		$db->query("INSERT INTO `publication` (`title`, `text`, `type`, `nowDate`) VALUES ('$title', '$text', 'new', '$newDate')");
		$textId = $db->query("SELECT `id` FROM `publication` WHERE `title` = '$title' AND `text` = '$text'");
		$str = $textId->fetch_assoc();
		$strId = $str['id'];
		$db->query("INSERT INTO `new` (`id`, `source`) VALUES ('$strId', '$source')");


	}
}
