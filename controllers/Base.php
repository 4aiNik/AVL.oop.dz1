<?php

class Base {
	
	
	public function LoadPage($name, $data = []) {
		$filename = 'templates/' . $name . '.php';
		$content = '';
		if (file_exists($filename)) {
			extract($data);
			require $filename;
		}
		return $content;
	}
	
	protected function LoadModel($name) {
		$filename = 'models/' . ucwords(strtolower($name)) . '.php';
		require_once($filename);
	}
	
	protected function redirectToAction($method = 'index',$action = 'home') {
		header("Location:index.php?action={$action}&method={$method}");
	}
}
