<?php

define('ROOT_DIR', dirname(__FILE__) . '/');
define('ROOT_PATH', basename(dirname(__FILE__ )) . '/');

$requestHome = '/' . ROOT_PATH;

$request = $_SERVER['REQUEST_URI'];
$uri = array();
$controller = null;
$method = null;
$param = array();
$adminRouting = false;

include_once 'config/db.php';
include_once 'components/Helper.php';

session_start();
Helper::loadTranslation();

$request = substr($request, strlen($requestHome));
if (strpos($request, 'admin') === 0) {
	$adminRouting = true;
	$request = substr($request, strlen('admin/') );
}

$uri = explode('/', $request, 3);
if ($uri[0]) {
	$controller = ucfirst($uri[0]);
	if (isset($uri[1])) {
		$method = 'action'. ucfirst($uri[1]);
		$param = isset($uri[2]) ? $uri[2] : array();
	}
}

if ($adminRouting) {
	$adminFolder = 'admin/';
	$namespace = '\admin\Controllers\\';
	if (!isset($_SESSION['user_id'])) {
		if ($method !== 'actionLogin') {
			header("Location: " . $requestHome . 'admin/user/login');
			exit();
		}
	}
} else {
	$adminFolder = '';
	$namespace = '\Controllers\\';
}

if (file_exists( 'controllers/' . $adminFolder . $controller . 'Controller.php')) {
	include_once  'controllers/' . $adminFolder . $controller . 'Controller.php';
} else {
	$controller = 'Home';
	include_once  'controllers/' . $adminFolder .'HomeController.php';
}

$controllerClass = $namespace . $controller . 'Controller';
$instance = new $controllerClass();

if(method_exists($instance, $method)) {
	call_user_func_array(array($instance, $method), array($param));
} else {
	call_user_func_array(array($instance, 'actionIndex'), array());
}