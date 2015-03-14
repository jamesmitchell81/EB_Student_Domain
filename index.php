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

use Controllers\Controller;

$controller = new Controller($_GET);

