<?php
	require 'config.php';
	require 'controllers/Base.php';
	require 'models/Publications.php';

	// контроллер и действие по умолчанию
	$controller_name = 'Home';
	$action_name = 'index';
		
	$routes = explode('/', $_SERVER['REQUEST_URI']);
	// получаем имя контроллера
	if ( !empty($routes[3]) ) {	
		$controller_name = $routes[3];
	}
		
	// получаем имя экшена
	if ( !empty($routes[4]) ) {
		$action_name = $routes[4];
	}

	$controller_file = 'controllers/' . $controller_name . '.php';

	if (file_exists($controller_file)) {
    	require $controller_file;
    	$controller = new $controller_name();
    	if (method_exists($controller, $action_name)) {
    		$controller->$action_name();
    	} else {
    		$error = new Base();
    		echo $error->LoadPage('error');
    	}
	} else {
		$error = new Base();
    	echo $error->LoadPage('error');
	}

?>