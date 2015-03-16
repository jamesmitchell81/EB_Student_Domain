<?php namespace Util;

// https://r.je/mvc-php-front-controller.html.
// include('./_util/Input.php');

include('./_configuration/Routes.php');
include('./_configuration/Domains.php');
include('./_configuration/Wildcards.php');

use Configuration\Routes;
use Configuration\Domains;
use Configuration\Wildcards;

class Router
{
  // get routes from config.
  // return required route.
  private $routes;
  private $domains;
  private $domainMatch = false;
  private $wildcards;

  private $username = '';
  private $domain = '';
  private $arguments = [];

  public function __construct($data = '')
  {
    $this->domains = Domains::getDomainsWhitelist();
    $this->wildcards = Wildcards::getWildcards();
    $this->routes = Routes::getRoutes();

    var_dump($data);

    // replace trailing slash.
    $data = rtrim($data, '/');

    $data = explode("/", $data);

    if ( preg_match("/^{$this->wildcards[':username']}$/", $data[0]) )
    {
      // remove the first element from the array assign as the username
      $this->username = array_shift($data);
    } else {
      $this->route = Routes::getRoute('signin');
    }

    $routePath = implode('/', $data);

    foreach ($this->domains as $key => $value) {
      if ( preg_match("/^{$value}$/", $data[0]) )
      {
        $this->domainMatch = true;
        $this->domain = array_shift($data);
        break;
      }
    }

    // diary/:yyyy/:mm/:dd
    // diary, #^\d{4}$#, #^\d{2}$, #^\d{2}$

    // route has domain?
    foreach($this->routes as $key => $value)
    {
      if ( preg_match("/^{$this->domain}/", $key) )
      {
        // if route has wildcard replace.
        $search = array_keys($this->wildcards);
        $patterns = array_values($this->wildcards);
        $subject = $key;

        // $r = preg_replace($pattern, $replace, $subject);
        $r = str_replace($search, $patterns, $subject);

        // escape slashes.
        $r = str_replace("/", "\/", $r);

        // attempt to match the route.
        if ( preg_match("/^{$r}$/", $routePath) )
        {
          $this->route = $this->routes[$key];
        }
      }
    }

    if ( !$this->domainMatch )
    {
      $this->route = Routes::getRoute('404');
    }
  }

  public function getRoute()
  {
    return $this->route;
  }

  public function getArguments()
  {
    return $this->arguments;
  }

  public function getUsername()
  {
    return $this->username;
  }
}