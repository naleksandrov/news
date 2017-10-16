<?php

namespace admin\controllers;

use models\Languages;
use models\User;

include_once 'models/Languages.php';
include_once 'models/User.php';

class AdminController {

	public function __construct() {
		$lang = new Languages();
		$lang->getLanguages();
		$user = new User();

		if (isset($_SESSION['user_id'])) {
			$user->getUser($_SESSION['user_id']);
		}
	}

}