<?php

include './_configuration/Routes.php';
include './_configuration/Domains.php';
include './_configuration/Wildcards.php';

class Router
{
  private $domains;
  private $wildcards;
  private $routes;
  private $data;
  private $arguments = [];
  private $action;
  private $routeMatch;

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
        $this->routeMatch = $routevalues[$i];
        return Routes::getRoute($this->routeMatch);
      }
    }
    // where no route found 404.
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
    $match = explode("/", $this->routeMatch);

    // remove the domain part.
    foreach ($this->domains as $value) {
      $index = array_search($value, $args);
      unset($args[$index]);

      $index = array_search($value, $match);
      unset($match[$index]);
    }

    // remove the action part.
    $this->action = preg_grep("/^{$this->wildcards[':action']}$/", $args);
    $matchAction = preg_grep("/^{$this->wildcards[':action']}$/", $match);
    if ( !empty($this->action) )
    {
      $this->action = array_shift($this->action);
      $index = array_search($this->action, $args);
      unset($args[$index]);

      $matchAction = array_shift($matchAction);
      $index = array_search($matchAction, $match);
      unset($match[$index]);
    }

    // get the arguments.
    foreach ($args as $arg) {
      $key = $this->matchWildcard($match, $arg);
      // $key = $this->getArgWildcard($arg);
      $this->arguments[$key] = $arg;
    }
  }

  // more exact method of matching wildcards.
  private function matchWildcard(&$domainMatchedWildcards, $arg)
  {
    foreach ($domainMatchedWildcards as $key) {
      $pattern = $this->wildcards[$key];
      if ( preg_match("/^$pattern$/", $arg) )
      {
        $index = array_search($key, $domainMatchedWildcards);
        unset($domainMatchedWildcards[$index]);
        return $key;
      }
    }
  }

  private function getArgWildcard($arg)
  {
    $key = $arg;
    foreach ($this->wildcards as $wildcard => $pattern) {
      if ( preg_match("/^$pattern$/", $key) )
      {
        $key = preg_replace($pattern, $wildcard, $key);
        // remove wildcard if used.
        unset($this->wildcards[$wildcard]);
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