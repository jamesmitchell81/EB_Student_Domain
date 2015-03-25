<?php namespace Util;

include('./_configuration/Routes.php');
include('./_configuration/Domains.php');
include('./_configuration/Wildcards.php');

use Configuration\Routes;
use Configuration\Domains;
use Configuration\Wildcards;

class Router
{
  private $domains;
  private $wildcards;
  private $routes;
  private $data;
  private $arguments = [];
  private $action;

  public function __construct($data = '')
  {
    $this->routePath = $data;
    $this->routePath = rtrim($data, '/');
    $this->data = explode("/", $this->routePath);

    $this->domains = Domains::getDomainsWhitelist();
    $this->wildcards = Wildcards::getWildcards();
    $this->routes = Routes::getRoutes();

    $this->username = $this->matchUsername();
    if ( $this->username ) {
      array_shift($this->data);
      $this->routePath = implode("/", $this->data);
    } else {
      $this->route = Routes::getRoute('signin');
    }

    $this->route = $this->determineCorrectRoute();
    $this->setArguments();
  }

  private function determineCorrectRoute()
  {
    $wildcardKeys = array_keys($this->wildcards);
    $wildcardPatterns = array_values($this->wildcards);
    $routekeys = implode("|", array_keys($this->routes));

    $domainRegex = str_replace($wildcardKeys, $wildcardPatterns, $routekeys);
    $domainRegex = str_replace("/", "\/", $domainRegex);

    $routekeys = explode("|", $domainRegex);
    $routevalues = array_keys($this->routes);

    for ($i = 0; $i < count($routekeys); $i++ ) {
      $domain = $routekeys[$i];

      if ( preg_match("/^($domain)$/", $this->routePath))
      {
        $route = $routevalues[$i];
        return Routes::getRoute($route);
      }
    }
    return Routes::getRoute('404');
  }

  public function getRoute()
  {
    return $this->route;
  }

  public function getUsername()
  {
    return $this->username;
  }

  /*
   * remove domains from the
   * array of url values.
   */
  private function setArguments()
  {
    $args = $this->data;

    foreach ($this->domains as $value) {
      $index = array_search($value, $args);
      unset($args[$index]);
    }

    $this->action = preg_grep("/^{$this->wildcards[':action']}$/", $args);
    if ( !empty($this->action) )
    {
      $this->action = array_shift($this->action);
      $index = array_search($this->action, $args);
      unset($args[$index]);
    }

    foreach ($args as $arg) {
      $key = $this->getArgWildcard($arg);
      $this->arguments[$key] = $arg;
    }
  }

  private function getArgWildcard($arg)
  {
    $key = $arg;
    foreach ($this->wildcards as $wildcard => $pattern) {
      if ( preg_match("/^$pattern$/", $key) )
      {
        $key = preg_replace($pattern, $wildcard, $key);
        return $key;
      }
    }
    return;
  }

  public function getAction()
  {
    return ( !empty($this->action) ) ? $this->action : '';
  }

  public function getArguments()
  {
    return $this->arguments;
  }

  private function matchUsername()
  {
    $data = explode("/", $this->routePath);
    $value = preg_grep("/^{$this->wildcards[':username']}$/", $data);

    return implode("", $value);
  }
}