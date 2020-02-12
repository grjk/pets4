<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload file
require("vendor/autoload.php");
require_once("model/validation-function.php");

// Start session
session_start();

// Instantiate Fat-Free
$f3 = Base::Instance();
$f3->set('colors', array('pink', 'green', 'blue'));

// Define a default route (view)
$f3 -> route("GET /", function () {
    $view = new Template();
    echo $view->render("views/home.html");
});

// Define a default route (view)
$f3 -> route("GET|POST /order", function ($f3) {


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
            $f3->reroute('/order2');
        } else {
            $f3->set("errors['animal']", "Please enter an animal.");
        }
    }
    $view = new Template();
    echo $view->render("views/form1.html");
});


// Define a default route (view)
$f3 -> route("GET|POST /order2", function ($f3) {
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$_SESSION['pet']->setColor($_POST['color']);
		$f3->reroute('/results');
	}

	$view = new Template();
	echo $view->render("views/form2.html");
});


$f3 -> route("GET|POST /results", function () {
    $view = new Template();


    echo $view->render("views/results.html");
});



$f3->route('GET /@animal',function ($f3, $params) {
//    var_dump($params);
    $animal = $params['animal'];
    if ($animal == 'chicken') {
        echo "<p>Cluck!</p>";
    } elseif ($animal == 'dog') {
        echo "<p>Woof!</p>";
    }elseif ($animal == 'snake') {
        echo "<p>SSsssss!</p>";
    }elseif ($animal == 'anteater') {
        echo "<p>Slurp!</p>";
    }elseif ($animal == 'vulture') {
        echo "<p>The sound of eating a corpse!</p>";
    } else {
        $f3->error(404);
    }
});

// Run Fat-Free
$f3->run();