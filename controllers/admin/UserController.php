<?php

namespace admin\controllers;
use models\User;

include_once 'controllers/admin/AdminController.php';

class UserController extends AdminController {

	public function __construct() {
		parent::__construct();
	}

	public function actionLogin() {
		$errors = array();
		if ($_POST) {
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$password = isset($_POST['password']) ? $_POST['password'] : '';

			$user = new User();
			$userList = $user->login($username, $password);

			if ($userList['success']) {
				$_SESSION['user_id'] = $userList['userId'];
				header("Location: /" . ROOT_PATH . 'admin/home/index');
				exit();
			} else {
				$errors = $userList['errors'];
			}
		}

		$pageTitle = 'User Login';
		$contentName = 'views/admin/login/login.php';
		include_once 'views/admin/layouts/default.php';
	}

	public function actionLogout() {
		unset($_SESSION['username']);
		header("Location: /" . ROOT_PATH . 'admin/user/login');
		exit();
	}
}