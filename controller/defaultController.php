<?php

class defaultController
{
	private $_f3; // Router


	public function __construct($f3)
	{
		$this->_f3 = $f3;

	}

	public function home()
	{
		$view = new Template();
		echo $view->render("views/home.html");
	}

	public function form1()
	{
        $_SESSION['animal'] = "";

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$animal = $_POST['animal'];

			if (validString($animal)) {
				$_SESSION['animal'] = $animal;
				switch (strtolower($animal)) {
					case "dog":
						$pet = new Dog();
						break;
					case "cat":
						$pet = new Cat();
						break;
					case "snake":
						$pet = new Snake();
						break;
					default:
						$pet = new Pet();
				}
				$_SESSION['pet'] = $pet;
				$this->_f3->reroute('/order2');
			} else {
				$this->_f3->set("errors['animal']", "Please enter an animal.");
			}
		}
		$view = new Template();
		echo $view->render("views/form1.html");
	}

	public function form2()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$_SESSION['pet']->setColor($_POST['color']);
			$_SESSION['pet']->setName($_POST['name']);
			$this->_f3->reroute('/results');
		}

		$view = new Template();
		echo $view->render("views/form2.html");
	}

	public function form3()
	{
		$view = new Template();
		echo $view->render("views/results.html");
	}

}