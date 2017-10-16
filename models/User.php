<?php

namespace models;
use components\MasterModel;
include_once 'components/MasterModel.php';

class User extends MasterModel {

	public static $loggedUserName;
	public static $isAdmin = false;
	public static $userId;

	public function getUser($id) {
		if ($id) {
			$userArr = $this->find('SELECT * FROM users WHERE id = "' . $id . '"', true);

			if ($userArr) {
				self::$loggedUserName = $userArr['username'];
				self::$isAdmin = true;
				self::$userId = $id;
			}
		}
	}

	public function login($username, $password) {
		$returnArr = array(
			'success' => false,
			'errors' => array()
		);

		if (!$username) {
			$returnArr['errors'][] = 'Моля въведете потребителско име';
		}
		if (!$password) {
			$returnArr['errors'][] = 'Моля въведете парола';
		}
		if (!$returnArr['errors']) {
			$userArr = $this->find('SELECT * FROM users WHERE username = "' . $username . '"', true);
			if($username !== $userArr['username'] || $password !== $userArr['password']) {
				$returnArr['errors'][] = 'Грешно потребителско име или парола';
			} else {
				$returnArr['success'] = true;
				$returnArr['userId'] = $userArr['id'];
			}
		}
		return $returnArr;
	}

}