<?php
class Announcement extends Publications {
	public $date = '';
	public $actuality = '';
//для проверки кнопки удаления закомментировать 9, 16-18стр
	public function add($title, $text, $actuality) {
		$db = $this->connection();
		$newDate = date("Y-m-d");
		if ($newDate < $actuality) {
			$db->query("INSERT INTO `publication` (`title`, `text`, `type`, `nowDate`) VALUES ('$title', '$text', 'announcement', '$newDate')");
			$textId = $db->query("SELECT `id` FROM `publication` WHERE `title` = '$title' AND `text` = '$text'");
			$str = $textId->fetch_assoc();
			$strId = $str['id'];
			$db->query("INSERT INTO `announcement` (`id`, `actuality`) VALUES ('$strId', '$actuality')");
			return true;
		} else {
			return false;
		}
	}

	public function del($id) {
		$db = $this->connection();
		$db->query("DELETE FROM `publication` WHERE `id` = '$id'");
		$db->query("DELETE FROM `announcement` WHERE `id` = '$id'");
	}
}