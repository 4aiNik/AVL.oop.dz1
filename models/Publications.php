<?php
class Publications {
	public $title = '';
	public $text = '';
	private $config = [];

	public function connection() {
		$config = $this->config;
		static $connection;
		if (empty($connection)) {
			$connection = mysqli_connect(HOST, USER, PASS, DBNAME);
			mysqli_set_charset($connection, ENCODING);
		}
		return $connection;
	}

	public function readAll() {
		$db = $this->connection();
		$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `id` DESC LIMIT 10");
		while ( $strAll = $queryAll->fetch_assoc() ) {
			$messages[] = $strAll;
		}
		 // echo "<pre>";
		 // print_r($messages);
		 // echo "</pre>";
		return $messages;
	}

	public function filterAll($type) {
		$db = $this->connection();
		if ($type == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `id` DESC LIMIT 10");
		} elseif ($type == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) WHERE `type` = 'new' ORDER BY `id` DESC LIMIT 10");
		} elseif ($type == '3') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `announcement` USING (id) WHERE `type` = 'announcement' ORDER BY `id` DESC LIMIT 10");
		} elseif ($type == '4') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `article` USING (id) WHERE `type` = 'article' ORDER BY `id` DESC LIMIT 10");
		}
		while ( $strAll = $queryAll->fetch_assoc() ) {
			$messages[] = $strAll;
		}
		return $messages;
	}

	public function sortAll($filter, $sort) {
		$db = $this->connection();
		if ($filter == '1' && $sort == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `nowDate` DESC LIMIT 10");
		} elseif ($filter == '1' && $sort == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `title` ASC LIMIT 10");
		} elseif ($filter == '2' && $sort == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) WHERE `type` = 'new' ORDER BY `nowDate` DESC LIMIT 10");
		} elseif ($filter == '2' && $sort == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) WHERE `type` = 'new' ORDER BY `title` ASC LIMIT 10");
		} elseif ($filter == '3' && $sort == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `announcement` USING (id) WHERE `type` = 'announcement' ORDER BY `nowDate` DESC LIMIT 10");
		} elseif ($filter == '3' && $sort == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `announcement` USING (id) WHERE `type` = 'announcement' ORDER BY `title` ASC LIMIT 10");
		} elseif ($filter == '4' && $sort == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `article` USING (id) WHERE `type` = 'article' ORDER BY `nowDate` DESC LIMIT 10");
		} elseif ($filter == '4' && $sort == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `article` USING (id) WHERE `type` = 'article' ORDER BY `title` ASC LIMIT 10");
		}
		while ( $strAll = $queryAll->fetch_assoc() ) {
			$messages[] = $strAll;
		}
		return $messages;
	}
}