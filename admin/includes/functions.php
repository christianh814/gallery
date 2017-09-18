<?php
function redirectTo($location) {
	header("Location: " . $location);
}
//
function classAutoLoader($class) {
	$the_path = "includes/{$class}.php";
	if (is_file($the_path) && !class_exists($class)) {
		require_once($the_path);
	}
}
spl_autoload_register('classAutoLoader');
?>
