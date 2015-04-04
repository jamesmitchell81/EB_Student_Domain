<?php

include_once './_util/Input.php';
include_once './_util/Navigation.php';
include './_util/Router.php';

// FrontController
class Controller
{
  private $router;
  private $route;

  public function __construct($data)
  {
    $this->router = new Router($data);

    $username = $this->router->getUsername();
    // authenticate username.
    $_SESSION['username'] = $username;

    $this->route = $this->router->getRoute();

    include("./_models/{$this->route->model}.php");
    include("{$this->route->controller}.php");
    include("./_views/{$this->route->view}.php");

    $model = new $this->route->model($this->router->getArguments(), $this->router->getAction());
    $view = new $this->route->view($model);
    $controller = new $this->route->controller($model, $view);
  }

}