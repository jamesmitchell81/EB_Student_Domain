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

    // remove trailing slash.
    $data = rtrim($data, '/');
    $data = explode("/", $data);

    if ( preg_match("/^{$this->wildcards[':username']}$/", $data[0]) )
    {
      // remove the first element from the array assign as the username
      $this->username = array_shift($data);
      $this->arguments['username'] = $this->username;
    } else {
      $this->route = Routes::getRoute('signin');
    }



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
    $search = array_keys($this->wildcards);
    $patterns = array_values($this->wildcards);
    $routePath = implode('/', $data);

    foreach($this->routes as $key => $value)
    {
      // route has domain?
      if ( preg_match("/^{$this->domain}/", $key) )
      {
        // try to get the action out of the url.
        // preg_match("/^{$this->wildcards[':action']}$/", $data[0])

        // replace wildcards with regex partners.
        $r = str_replace($search, $patterns, $key);
        $r = str_replace("/", "\/", $r);  // escape slashes in url.

        // attempt to match the routes with wildcards
        if ( preg_match("/^{$r}$/", $routePath) )
        {
          // gleen all of the arguments.
          while ( !empty($data) )
          {
            $this->arguments[] = array_shift($data);
          }

          $this->route = $this->routes[$key];
          $this->domainMatch = true;
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