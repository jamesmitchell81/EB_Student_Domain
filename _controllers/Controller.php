<?php namespace Controllers;

// FrontController

class Controller
{
  private $routes;

  public function __construct()
  {
    $data = $_GET['data'];

    include('./configuration/routes.php');

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
        var_dump($this->routes[$key]);
      } else {
        // throw out..exit...
      }
      // print $str;
    }

    var_dump(explode('/', $data));
  }

}