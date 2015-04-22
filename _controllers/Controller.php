<?php

include_once './_util/Input.php';
include_once './_util/Navigation.php';
include_once './_util/Router.php';

// FrontController
class Controller
{
  private $router;
  private $route;

  public function __construct($data)
  {
    $this->router = new Router($data);

    if ( session_status() != PHP_SESSION_ACTIVE)
    {
      session_start();
    }

    // authenticate username.
    if ( Input::session('username') ) {
      $username = $this->router->getUsername();
      if ( Input::session('username') == $username )
      {
        $this->route = $this->router->getRoute();
      } else {
        $this->route = Routes::getRoute('signin');
      }
    } else {
      $this->route = Routes::getRoute('signin');
    }

    // $_SESSION['username'] = $username;

    include("./_models/{$this->route->model}.php");
    include("{$this->route->controller}.php");
    include("./_views/{$this->route->view}.php");

    $model = new $this->route->model($this->router->getArguments(), $this->router->getAction());
    $view = new $this->route->view($model);
    $controller = new $this->route->controller($model, $view);
  }

}