<?php


class Cat extends Pet {

	function __construct($name = "", $color = "?") {
		$this->_name = $name;
		$this->_color = $color;
		parent::setType('cat');
	}

	function talk() {
		echo "meowing </br>";
	}
}