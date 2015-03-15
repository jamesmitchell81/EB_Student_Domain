<?php namespace Controllers;

include './_util/Input.php';
include './_util/Router.php';

use Util\Input;
use Util\Router;

// FrontController
class Controller
{
  private $router;
  private $route;

  public function __construct()
  {
    $data = Input::get('data');

    $this->router = new Router($data);
    $this->route = $this->router->getRoute();
    // include("{$this->route->model}.php");
    include("{$this->route->controller}.php");
    // include("{$this->route->view}.php");

    // $model = new $this->route->model;
    $controller = new $this->route->controller; //new $this->route->controller($model);

    // var_dump($this->route);
    // var_dump(explode('/', $data));
  }

}