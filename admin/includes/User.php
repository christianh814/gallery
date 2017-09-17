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
		return mysqli_fetch_array(self::findThisQuery("SELECT * FROM users WHERE id = '{$user_id}' "));
	}

	public static function findThisQuery($sql) {
		global $db;
		$result_set = $db->queryDB($sql);
		return $result_set;
	}

	public static function instantiation($found_user) {
		$the_object = new self;
		$the_object->id = $found_user['id'];
		$the_object->username = $found_user['username'];
		$the_object->password = $found_user['password'];
		$the_object->first_name = $found_user['first_name'];
		$the_object->last_name = $found_user['last_name'];
		return $the_object;
	}
}
?>
