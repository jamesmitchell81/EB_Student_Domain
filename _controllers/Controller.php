<?php namespace Controllers;

include_once './_util/Input.php';
include './_util/Router.php';

use Util\Input;
use Util\Router;

// FrontController
class Controller
{
  private $router;
  private $route;

  public function __construct($data)
  {
    // $data = Input::get('data');

    $this->router = new Router($data);

    $username = $this->router->getUsername();
    // authenticate username.

    $this->route = $this->router->getRoute();

    include("./_models/{$this->route->model}.php");
    include("{$this->route->controller}.php");
    include("./_views/{$this->route->view}.php");

    $model = new $this->route->model($this->router->getArguments());
    $view = new $this->route->view($model);
    $controller = new $this->route->controller($model, $view);
    // $view->display();

    // var_dump($this->route);
    // var_dump(explode('/', $data));
  }

}