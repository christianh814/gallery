<?php
class User {
	public function findAllUsers() {
		global $db;
		$sql = "SELECT * FROM users ";
		$result_set = $db->queryDB($sql);
		return $result_set;
	}
}
?>
