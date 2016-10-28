<?php

class Home extends Base {

	public $notes = [];

	public function index() {
		$this->LoadModel('Publications');
		$model = new Publications();
		$message['messages'] = $model->readAll();

		//require ('templates/editPublication.php');
		$this->LoadPage('editPublication', $message);
	}

	public function checkNote() {
		$this->LoadModel('Publications');
		$model = new Publications();
		$message = $model->readAll();

		if (isset($_POST['rating'])) {
			$this->LoadModel('article');
			$model = new Article();
			$newNote = $model->checkNote($_POST['article'], $_POST['rating']);
		}
		$this->redirectToAction("index","home");
	}
}
