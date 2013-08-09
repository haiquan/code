<?php
// 学习使用magic方法：__contruct __destruct
class Person {
	private $name;
	private $age;
	private $id;

	function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
	}

	function setid($id) {
		$this->id = $id;
	}

	function __destruct() {
		if ( !empty($this->id) ) {
			print "saving the person\n";
		}
	}
}

$person = new Person('haiquan', '27');
$person->setid(1);
unset($person);
