<?php

namespace controllers;

class SiteController {

	public function actionAjaxSetLanguage($language) {
		$returnArr = ['success' => false];
		$paramArr = explode('/', $language);

		$_SESSION['language'] = $paramArr[0];
		$_SESSION['language_id'] = $paramArr[1];
		$returnArr['success'] = true;

	    echo json_encode($returnArr);
	}

}