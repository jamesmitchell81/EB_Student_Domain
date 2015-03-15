<?php namespace Util;

// https://r.je/mvc-php-front-controller.html.
include('./_util/Input.php');

class Router
{
  // get routes from config.
  // return required route.
  public function __construct()
  {
  	include('./_configuration/routes.php');

    if ( !isset($_GET['data']) )
    {
      exit(0); // redirect...
    } else {
      $data = $_GET['data'];
    }

    $wildcards = [
      ':username' => '\d{8}',
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
  }
}