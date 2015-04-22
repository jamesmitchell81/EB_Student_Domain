<?php

$path = $_SERVER['REQUEST_URI'];
/* $path = explode("/", $path); */

// define("BASE_PATH", "/~10425907/group_project/");
define("BASE_PATH", "http://localhost/~jm/group_project/");
/* define("BASE_PATH", $path); */

date_default_timezone_set("Europe/London");

include './_controllers/Controller.php';
include './_views/View.php';
include_once './_util/Input.php';

$data = (Input::get('data')) ?  Input::get('data') : 'signin';

$controller = new Controller($data);

