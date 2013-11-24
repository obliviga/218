<?php

class myClass {
	public $prop1 = "I'm a class property!";
	
	public static $count = 0;
	
	public function __construct() {
		echo 'The class "', __CLASS__, '" was initiated!<br>';
	}
	
	public function __destruct() {
		echo 'The class "', __CLASS__, '" was destroyed.<br>';	
	}
	
	public function __toString() {
		echo "Using the toString method: ";
		return $this->getProperty();
	}
	
	public function setProperty($newval) {
		$this->prop1 = $newval;
	}
	
	private function getProperty() {
		return $this->prop1 . "<br>";
	}
	
	public static function plusOne() {
		return "The Count is " . ++self::$count . "<br>";
	}
}

class myOtherClass extends myClass {
	
	public function __construct() {
		parent::__construct(); //Call the parent class's constructor
		echo "A new constructor is ".__CLASS__. ".<br>";
	}
	
	public function newMethod() {
		echo "From a new method in " . __CLASS__ . ".<br>";
	}
	
	public function callProtected() {
		return $this->getProperty();
	}
	
}

do {
	echo myClass::plusOne();
} while ( myClass::$count < 10);

// Create new object
$newobj = new myOtherClass;


// Call the protected method from within a public method
echo $newobj->callProtected();


?>