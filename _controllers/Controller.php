<?php namespace Controllers;

// FrontController
class Controller
{
  private $routes;
  private $route;

  public function __construct()
  {
 

    // $model = new $this->route->model;
    include("{$this->route->controller}.php");

    $controller = new $this->route->controller; //new $this->route->controller($model);
    // $view = new $this->route->view($model);

    // var_dump($this->route);
    var_dump(explode('/', $data));
  }

}