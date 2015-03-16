<?php

// include 'util/ViewBuffer.php';

// use Util\ViewBuffer;

// $hello = [
//   "name" => "James",
//   "surname" => "Mitchell"
// ];

// $view = new ViewBuffer('hello.php');
// $view->addData($hello)->buff();

// include './configuration/routes.php';

include './_controllers/Controller.php';
include './_views/View.php';
include_once './_util/Input.php';

use Controllers\Controller;
use Util\Input;

$data = (Input::get('data')) ?  Input::get('data') : 'signin';

$controller = new Controller($data);

