<?php

namespace components;
use components\Database;
include_once 'components/Database.php';

class MasterModel {
	private $conn;
	public $languageId = 1;

	public function __construct() {
		$this->conn = Database::getInstance();

		if (isset($_SESSION['language_id'])) {
			$this->languageId = $_SESSION['language_id'];
		}
	}

	public function find($query, $isSingleRow = false) {
		$result = null;
		$sql = $this->conn->prepare($query);
		$sql->execute();
		$sql->setFetchMode(\PDO::FETCH_ASSOC);

		if ($isSingleRow) {
			$result = $sql->fetch();
		} else {
			$result = [];
			foreach($sql->fetchAll() as $row) {
				$result[] = $row;
			}
		}

		$conn = null;
		return $result;
	}

	public function executePrepare($query) {
		$sql = $this->conn->prepare($query);
		$sql->execute();

		$conn = null;
	}

	public function execute($query) {
		$this->conn->exec($query);

		$conn = null;
	}

	public function insertMultiple($queriesArr) {
		$this->conn->beginTransaction();

		foreach ($queriesArr as $query) {
			$this->conn->exec($query);
		}

		$this->conn->commit();
		$conn = null;
	}

	public function insertAndReturnLastId($query) {
		$this->conn->exec($query);
		$lastId = $this->conn->lastInsertId();

		$conn = null;
		return $lastId;
	}

}