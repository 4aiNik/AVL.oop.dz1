<?php

class Control extends Base {
	public function addnews() {
		$this->LoadModel('News');
		$model = new News();
		$this->LoadPage('addNew');
	}

	public function savenew() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->LoadModel('News');
			$model = new News();
			
			$model->add($_POST['title'], $_POST['text'], $_POST['source']);
			
			$this->redirectToAction("index","home");
		}
	}

	public function addannounce() {
		$this->LoadModel('Announcement');
		$model = new Announcement();
		$this->LoadPage('addAnnouncement');
	}

	public function saveannounce() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->LoadModel('Announcement');
			$model = new Announcement();
			
			$result = $model->add($_POST['title'], $_POST['text'], $_POST['actuality']);
			if ($result) {
				$this->redirectToAction("index","home");
			} else {
				$this->LoadPage('error');
			}
		}
	}

	public function delannounce() {
		$this->LoadModel('Announcement');
		$model = new Announcement();

		$routes = preg_split('/[\/]+/', $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
		if ( !empty($routes[4]) ) {
			$options = $routes[4];
		}

		$result = $model->del($options);
		$this->LoadPage('editPublication');
	}

	public function addarticle() {
		$this->LoadModel('Article');
		$model = new Article();
		$this->LoadPage('addArticle');
	}

	public function savearticle() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->LoadModel('Article');
			$model = new Article();
			
			$model->add($_POST['title'], $_POST['text'], $_POST['autors']);
			
			$this->redirectToAction("index","home");
		}
	}

	public function sort() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->LoadModel('Publications');
			$model = new Publications();
			$message = $model->sortAll($_POST['filter'], $_POST['sort']);
			require ('templates/editPublication.php');
		}
	}
}
