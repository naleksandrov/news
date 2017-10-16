<?php

namespace models;
use components\MasterModel;
include_once 'components/MasterModel.php';

class Languages extends MasterModel {

	public static $langList;

	public function getLanguages() {
		$languagesArr = $this->find('SELECT * FROM languages');
		self::$langList = $languagesArr;
	}

}