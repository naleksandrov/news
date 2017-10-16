<?php

namespace components;

use models\Languages;
include_once 'models/Languages.php';

class MasterController {

	public function __construct() {
		$lang = new Languages();
		$lang->getLanguages();
	}
}