<?php

namespace admin\controllers;

include_once 'controllers/admin/AdminController.php';

class HomeController extends AdminController {

	public function __construct() {
		parent::__construct();
	}

	public function actionIndex() {

		$pageTitle = 'Admin Dashboard';
		$contentName = 'views/admin/master/home.php';
		include_once 'views/admin/layouts/default.php';
	}
}