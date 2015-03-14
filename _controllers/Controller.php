<?php namespace Controllers;

// FrontController
class Controller
{
  private $routes;
  private $route;

  public function __construct()
  {
    include('./_configuration/routes.php');

    if ( !isset($_GET['data']) )
    {
      // redirect
      exit(0);
    } else {
      $data = $_GET['data'];
    }

    $wildcards = [
      ':yyyy' => '\d{4}',
      ':mm'   => '\d{2}',
      ':dd'   => '\d{2}'
    ];

    // if is set...
    $this->routes = $routes;
    // else $this->routes = [];

    // convert to regex
    foreach ($this->routes as $key => $value)
    {
      $str = $key;
      $str = str_replace(":yyyy", '\d{4}', $str);
      $str = str_replace(":mm",   '\d{2}', $str);
      $str = str_replace(":dd",   '\d{2}', $str);

      if( preg_match('#^' . $str . '$#', $data) )
      {
        $this->route = $this->routes[$key];
      } else {
        // throw out..exit...
      }
      // print $str;
    }

    // $model = new $this->route->model;
    include("{$this->route->controller}.php");

    $controller = new $this->route->controller; //new $this->route->controller($model);
    // $view = new $this->route->view($model);

    // var_dump($this->route);
    var_dump(explode('/', $data));
  }

}