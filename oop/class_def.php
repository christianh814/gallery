<?php
class Car {
	static $door_count = 2;
	static function getValues() {
		return self::$door_count;
	}
}
class Truck extends Car {
	static function displayStuff() {
		echo parent::getValues();
	}
}
//
Truck::displayStuff();
?>
