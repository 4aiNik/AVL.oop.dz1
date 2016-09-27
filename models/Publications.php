<?php
class Publications {
	public $title = '';
	public $text = '';
	private $config = [];

	public function __construct() {
		$this->config = require 'config.php';
	}
	
	public function connection() {
		$config = $this->config;
		static $connection;
		if (empty($connection)) {
			$connection = mysqli_connect($config['host'], $config['user'], $config['password'], $config['dbname']);
			mysqli_set_charset($connection, $config['encoding']);
		}
		return $connection;
	}

	public function readAll() {
		$db = $this->connection();
		$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `id` DESC LIMIT 10");
		while ( $strAll = $queryAll->fetch_assoc() ) {
			$messages[] = $strAll;
		}
		$allMessages = $this->buttonDel($messages);
		// echo "<pre>";
		// print_r($allMessages);
		// echo "</pre>";
		return $allMessages;
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
		$allMessages = $this->buttonDel($messages);
		return $allMessages;
	}

	public function sortAll($type) {
		$db = $this->connection();
		if ($type == '1') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `nowDate` DESC LIMIT 10");
		} elseif ($type == '2') {
			$queryAll = $db->query("SELECT * FROM `publication` LEFT JOIN `new` USING (id) LEFT JOIN `announcement` USING (id) LEFT JOIN `article` USING (id) ORDER BY `title` ASC LIMIT 10");
		}
		while ( $strAll = $queryAll->fetch_assoc() ) {
			$messages[] = $strAll;
		}
		$allMessages = $this->buttonDel($messages);
		return $allMessages;
	}

	private function buttonDel($messages) {
		for ($i=0; $i<count($messages); $i++) {
			if ($messages[$i]['type'] == 'announcement'){
				if ($messages[$i]['nowDate'] > $messages[$i]['actuality']){
					$messages[$i]['button'] = '
					<form action="index.php?action=control&method=delannounce&id='.$messages[$i]["id"].'" method="post">
   						<button type="submit">удалить</button>
  					</form>
					';
				} else {
					$messages[$i]['button'] = '';
				}
			}
		}
		return $messages;
	}
}