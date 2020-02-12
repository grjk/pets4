<?php


class Snake extends Pet {
	private $_length;

	/**
	 * Snake constructor.
	 * @param string $_length
	 * @param string $_name
	 * @param string $_color
	 */
	public function __construct($_name = "", $_color ="?", $_length = "average") {
		$this->_length=$_length;
		parent::setName($_name);
		parent::setColor($_color);
		parent::setType("Snake");
	}


	public function talk() {
		echo "sssssSSSsssSSS-ing";
	}

	/**
	 * @return mixed
	 */
	public function getLength() {
		return $this->_length;
	}

	/**
	 * @param mixed $length
	 */
	public function setLength($length) {
		$this->_length=$length;
	}

}