<?php

class Helper {
	public static $translation;

	public static function loadTranslation() {

		if (isset($_SESSION['language'])) {
			self::$translation = require 'translations/' . $_SESSION['language'] . '.php';
		} else {
			self::$translation = require 'translations/Bulgarian.php';
		}

	}

}