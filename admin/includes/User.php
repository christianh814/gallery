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
	
	//

	private function hasAttrib($attrib) {
		$object_prop = get_object_vars($this);
		return array_key_exists($attrib, $object_prop);
	}
}
?>
