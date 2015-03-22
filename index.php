<?php

define("BASE_PATH", "/~jm/group_project/");

include './_controllers/Controller.php';
include './_views/View.php';
include_once './_util/Input.php';

use Controllers\Controller;
use Util\Input;

$data = (Input::get('data')) ?  Input::get('data') : 'signin';

$controller = new Controller($data);

