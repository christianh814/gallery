<?php
class User extends DBObject {
	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	//

	public static function verifyUser($username, $password) {
		global $db;
		$username = $db->escapeString($username);
		$password = $db->escapeString($password);
		$sql = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' ";
		$the_result_array = self::findByQuery($sql);
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

}
?>
