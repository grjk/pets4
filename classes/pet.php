<?php

class Pet {
    private $_name;
    private $_color;
    private $_type;

    // Default constructor / Parameterized constructor
    function __construct($name = "", $color = "?") {
        $this->_name = $name;
        $this->_color = $color;
    }

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->_type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type) {
		$this->_type=$type;
	}



    function getName() {
        return $this->_name;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setColor($color) {
        $this->_color = $color;
    }

    function getColor() {
        return $this->_color;
    }

    function eat() {
        echo "eating<br>";
    }

    function talk() {
        echo "talking<br>";
    }
}