<?php
	require 'controllers/Base.php';
	require 'models/Publications.php';

	$action = isset($_GET['action']) ? strtolower($_GET['action']) : 'Home';
	$action = ucwords($action);
	$method = isset($_GET['method']) ? $_GET['method'] : 'index';

	$action_file = 'controllers/' . $action . '.php';

	if (file_exists($action_file)) {
    	require $action_file;
    	$controller = new $action();
    	$controller->$method();
	} else {
		$error = new Base();
    	echo $error->LoadPage('error');
	}
?>