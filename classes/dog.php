<?php

class Dog extends Pet {

	function __construct($name = "unknown", $color = "?") {
		$this->_name = $name;
		$this->_color = $color;
		parent::setType('dog');
	}

    function fetch() {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk() {
        echo $this->getName() . " is barking </br>";
    }
}