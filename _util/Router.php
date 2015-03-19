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
  private $routePath;

  private $domains;
  private $wildcards;
  private $data;

  private $username = '';
  private $domain = '';
  private $arguments = [];
  private $action;

  public function __construct($data = '')
  {
    $this->routePath = $data;
    $this->routePath = rtrim($data, '/');
    $this->data = explode("/", $this->routePath);
    // default route.
    $this->route = Routes::getRoute('404');

    $this->domains = Domains::getDomainsWhitelist();
    $this->wildcards = Wildcards::getWildcards();
    $this->routes = Routes::getRoutes();

    $this->matchUsername();
    $this->domain = $this->matchDomain();

    $this->action = $this->matchAction();

    // diary/:yyyy/:mm/:dd
    // diary, #^\d{4}$#, #^\d{2}$, #^\d{2}$
    $search = array_keys($this->wildcards);
    $patterns = array_values($this->wildcards);

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
        // var_dump($this->routePath);
        var_dump($this->routePath);
        var_dump($r);
        if ( preg_match("/^{$r}$/", $this->routePath) )
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

    var_dump($this->domain);
    var_dump($this->data);
    var_dump($this->route);
  }

  private function matchUsername()
  {
    $data = explode("/", $this->routePath);
    $value = preg_grep("/^{$this->wildcards[':username']}$/", $data);

    return $value;
  }

  private function matchDomain()
  {
    $data = explode("/", $this->routePath);

    $domains = implode("/", array_values($this->domains));

    // foreach ($this->domains as $key => $value)
    // {

      $domain = preg_grep("/\$domains/", $data);
      var_dump($domain);
    // }
    return $domain;

    //   if ( preg_match("/^{$value}$/", $this->data[0]) )
    //   {
    //     return array_shift($this->data);
    //   }
    // }
  }

  private function matchAction()
  {
    // try to get the action out of the url.
    $match = preg_match("/^{$this->wildcards[':action']}$/", $this->data[0]);

    if ( !$match || empty($this->data) )
    {
      return '';
    }
    return array_shift($this->data);
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
