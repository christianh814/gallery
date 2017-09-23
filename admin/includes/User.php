<?php
class User {
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	//
	public static function findAllUsers() {
		return self::findThisQuery("SELECT * FROM users ");
	}

	public static function findUserById($user_id) {
		$the_result_array = self::findThisQuery("SELECT * FROM users WHERE id = '{$user_id}' ");
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	public static function findThisQuery($sql) {
		global $db;
		$result_set = $db->queryDB($sql);
		$the_object_array = array();
		while ($row = mysqli_fetch_array($result_set)) {
			$the_object_array[] = self::instantiation($row);
		}
		return $the_object_array;
	}

	public static function instantiation($the_record) {
		$the_object = new self;
		foreach ($the_record as $attrib => $value) {
			if ($the_object->hasAttrib($attrib)) {
				$the_object->$attrib = $value;
			}
		}
		return $the_object;
	}

	public static function verifyUser($username, $password) {
		global $db;
		$username = $db->escapeString($username);
		$password = $db->escapeString($password);
		$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ";
		$the_result_array = self::findThisQuery($sql);
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	public function create() {
		global $db;
		$sql = "INSERT INTO users (username, password, first_name, last_name) ";
		$sql .= "VALUES ('";
		$sql .= $db->escapeString($this->username) . "', '";
		$sql .= $db->escapeString($this->password) . "', '";
		$sql .= $db->escapeString($this->first_name) . "', '";
		$sql .= $db->escapeString($this->last_name) . "') ";

		if ($db->queryDB($sql)) {
			$this->id = $db->insertId();
			return true;
		} else {
			return false;
		}

	}

	public function update() {
		global $db;
		$sql = "UPDATE users SET ";
		$sql .= "username = '" . $db->escapeString($this->username) . "', ";
		$sql .= "password = '" . $db->escapeString($this->password) . "', ";
		$sql .= "first_name = '" . $db->escapeString($this->first_name) . "', ";
		$sql .= "last_name = '" . $db->escapeString($this->last_name) . "' ";
		$sql .= "WHERE id = " . $db->escapeString($this->id) . " ";
		$db->queryDB($sql);

		return (mysqli_affected_rows($db->con) == 1) ? true : false;
	}

	public function delete() {
		global $db;
		$sql = "DELETE FROM users WHERE id = '" . $db->escapeString($this->id) . "' ";
		$db->queryDB($sql);
		return (mysqli_affected_rows($db->con) == 1) ? true : false;
	}
	
	//

	private function hasAttrib($attrib) {
		$object_prop = get_object_vars($this);
		return array_key_exists($attrib, $object_prop);
	}
}
?>
