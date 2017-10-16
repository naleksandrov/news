<?php

namespace components;

class Database {
	private static $instance;
	private $pdo;

	private function __construct() {
		$servername = DB_HOST;
		$username = DB_USER;
		$password = DB_PASS;
		$charset = DB_CHARSET;

		try {
			$this->pdo = new \PDO("mysql:host=$servername;dbname=news;charset=$charset", $username, $password);
			// set the PDO error mode to exception
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}
		catch(\PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public static function getInstance() {
		if(self::$instance === null) {
			self::$instance = new Database();
		}
		return self::$instance->pdo;
	}
}