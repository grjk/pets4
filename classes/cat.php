<?php


class Cat extends Pet {

	function __construct($name = "unknown", $color = "?") {
		$this->_name = $name;
		$this->_color = $color;
		parent::setType('cat');
	}

	function talk() {
		echo $this->getName() . " is meowing </br>";
	}
}