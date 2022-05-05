<?php

//Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);
//Require the autoload file
require_once('vendor/autoload.php');

//start a session
session_start();

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
$f3->route('POST /order2', function() {
    var_dump($_POST);
    $_SESSION['pet'] = $_POST['pet'];
    $_SESSION['color'] = $_POST['color'];
    $view = new Template();
    echo $view->render('views/pet-order2.html');
});

//Summary
$f3->route('POST /summary', function() {
    var_dump($_POST);
    $_SESSION['name'] = $_POST['name'];
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run fat free
// -> is invoking the run() method in the fat-free
$f3->run();