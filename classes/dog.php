<?php

class Dog extends Pet {

	function __construct($name = "", $color = "?") {
		$this->_name = $name;
		$this->_color = $color;
		parent::setType('dog');
	}

    function fetch() {
        echo "fetching </br>";
    }

    function talk() {
        echo "barking </br>";
    }
}