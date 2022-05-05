<?php

//Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);
//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
//:: is used to call a method within the static Base class within fat-free
$f3 = Base::instance();

//Define a default route
//
$f3->route('GET /', function() {

    $view = new Template();
    echo $view->render('views/pet-home.html');
});

//Order route
$f3->route('GET /order', function() {

    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//Order2 route
$f3->route('GET|POST /order2', function() {

    $_SESSION['pet'] = $_POST['pet'];
    $_SESSION['color'] = $_POST['color'];
    $view = new Template();
    echo $view->render('views/pet-order2.html');
});

//Run fat free
// -> is invoking the run() method in the fat-free
$f3->run();