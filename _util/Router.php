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
      return Routes::getRoute('signin');
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

    $wildcardKeys = array_keys($this->wildcards);
    $wildcardPatterns = array_values($this->wildcards);

    foreach ($args as $arg) {
      $this->arguments[] = $arg;
    }

    var_dump($this->arguments);
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