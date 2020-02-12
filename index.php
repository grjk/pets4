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

$controller = new defaultController($f3);

// Define a default route (view)
$f3 -> route("GET /", function () {
	$GLOBALS['controller']->home();
});

// Define a default route (view)
$f3 -> route("GET|POST /order", function () {
	$GLOBALS['controller']->form1();
});


// Define a default route (view)
$f3 -> route("GET|POST /order2", function ($f3) {
	$GLOBALS['controller']->form2();
});


$f3 -> route("GET|POST /results", function () {
    $GLOBALS['controller']->form3();
});


// Run Fat-Free
$f3->run();