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
  private $route;
  private $routes;
  private $domains;
  private $wildcards;
  private $data;

  private $username = '';
  private $domain = '';
  private $arguments = [];
  private $action;

  public function __construct($data = '')
  {
    // default route.
    $this->route = Routes::getRoute('404');
    $this->data = $data;

    $this->domains = Domains::getDomainsWhitelist();
    $this->wildcards = Wildcards::getWildcards();
    $this->routes = Routes::getRoutes();

    // remove trailing slash.
    $this->data = rtrim($this->data, '/');
    $this->data = explode("/", $this->data);

    $this->matchUsername();
    $this->domain = $this->matchDomain();
    $this->action = $this->matchAction();

    // diary/:yyyy/:mm/:dd
    // diary, #^\d{4}$#, #^\d{2}$, #^\d{2}$
    $search = array_keys($this->wildcards);
    $patterns = array_values($this->wildcards);
    $routePath = implode('/', $this->data);

    $keys = array_keys($this->routes);
    $i = 0;
    while ( !empty($this->data) && $i < count($this->routes) )
    {
      $key = $keys[$i++];
      // route has domain?
      if ( preg_match("/^{$this->domain}/", $key) )
      {
        // replace wildcards with regex partners.
        $r = str_replace($search, $patterns, $key);
        $r = str_replace("/", "\/", $r);  // escape slashes in url.

        // attempt to match the routes with wildcards
        if ( preg_match("/^{$r}$/", $routePath) )
        {
          // gleen all of the arguments.
          while ( !empty($this->data) )
          {
            $this->arguments[] = array_shift($this->data);
          }

          $this->route = $this->routes[$key];
        }

      }
    }

  }

  private function matchUsername()
  {
    if ( preg_match("/^{$this->wildcards[':username']}$/", $this->data[0]) )
    {
      // remove the first element from the array assign as the username
      $this->arguments['username'] = array_shift($this->data);
    } else {
      $this->route = Routes::getRoute('signin');
    }
  }

  private function matchDomain()
  {
    // is a valid domain.
    foreach ($this->domains as $key => $value) {
      if ( preg_match("/^{$value}$/", $this->data[0]) )
      {
        return array_shift($this->data);
      }
    }    
  }

  private function matchAction()
  {
    // try to get the action out of the url.
    if ( preg_match("/^{$this->wildcards[':action']}$/", $this->data[0]) ) 
    {
      return array_shift($this->data);
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

  private function getAction()
  {
    return $this->action;
  }
}