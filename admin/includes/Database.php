<?php
require_once("new_config.php");
//
class Database {
	// Public Methods
	public $con;

	function __construct() {
		$this->openDBconnection();
	}

	public function openDBconnection() {
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($this->con->connect_errno) {
			die("Database Error: " . $this->con->connect_errno);
		}
	}

	public function queryDB($sql) {
		$result = $this->con->query($sql);
		$this->confirmQuery($result);
		return $result;
	}

	public function escapeString($string) {
		$escaped_string = $this->con->real_escape_string($string);
		return $escaped_string;
	}

	public function insertId() {
		return mysqli_insert_id($this->con);
	}

	public function theInsertId($string) {
		return $this->con->insert_id;
	}

	// Private Methods

	private function confirmQuery($result) {
		if (!$result) {
			die("Query Failed: " . $this->con->error);
		}
	}
}
$db = new Database();
?>
