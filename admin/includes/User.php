<?php
class User {
	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
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

	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $db;
		$properties = $this->cleanProperties();
		$sql = "INSERT INTO " . self::$db_table . " (" . implode(",", array_keys($properties)) . ") ";
		$sql .= "VALUES ('" . implode("', '", array_values($properties)) . "') ";

		if ($db->queryDB($sql)) {
			$this->id = $db->insertId();
			return true;
		} else {
			return false;
		}

	}

	public function update() {
		global $db;
		//
		$properties = $this->cleanProperties();
		$properties_pairs = array();
		foreach ($properties as $key => $val) {
			$properties_pairs[] = "{$key}='{$val}'";
		}
		//
		$sql = "UPDATE " . self::$db_table . " SET ";
		$sql .= implode(", ", $properties_pairs);
		$sql .= " WHERE id = " . $db->escapeString($this->id) . " ";
		$db->queryDB($sql);

		return (mysqli_affected_rows($db->con) == 1) ? true : false;
	}

	public function delete() {
		global $db;
		$sql = "DELETE FROM " . self::$db_table . " WHERE id = '" . $db->escapeString($this->id) . "' ";
		$db->queryDB($sql);
		return (mysqli_affected_rows($db->con) == 1) ? true : false;
	}
	
	//

	private function hasAttrib($attrib) {
		$object_prop = get_object_vars($this);
		return array_key_exists($attrib, $object_prop);
	}

	//
	protected function properties () {
		$properties = array();
		foreach (self::$db_table_fields as $dbf) {
			if(property_exists($this, $dbf)) {
				$properties[$dbf] = $this->$dbf;
			}
		}
		return $properties;
	}
	protected function cleanProperties() {
		global $db;
		$clean_prop = array();
		foreach ($this->properties() as $key => $val) {
			$clean_prop[$key] = $db->escapeString($val);
		}
		return $clean_prop;
	}
}
?>
