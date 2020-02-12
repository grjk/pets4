<?php


class Cat extends pet{

	function talk() {
		echo $this->getName() . " is meowing </br>";
	}
}