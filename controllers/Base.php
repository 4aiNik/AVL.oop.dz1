<?php

class Base {
	
	
	public function LoadPage($name, $data = []) {
		$filename = 'templates/' . $name . '.php';
		$content = '';
		if (file_exists($filename)) {
			ob_start();
			extract($data);
			require $filename;
//			echo "<pre>";
//			print_r($data);
			$content = ob_get_contents();
			ob_end_clean();
		}
		return $content;
	}
	
	protected function LoadModel($name) {
		$filename = 'models/' . ucwords(strtolower($name)) . '.php';
		require_once($filename);
	}
	
	protected function redirectToAction($method = 'index',$action = 'home') {
		header("Location:".ROOT."$action/$method");
		exit(); 
	}
}
