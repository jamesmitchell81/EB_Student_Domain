<?php

include './_configuration/Routes.php';
include './_configuration/Domains.php';
include './_configuration/Wildcards.php';

/**
 * Determine required route from url.
 * extract actions and arguments from url.
 */
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
    $this->routePath = rtrim($data, '/');
    $this->data = explode("/", $this->routePath);

    $this->domains = Domains::getDomainsWhitelist();
    $this->wildcards = Wildcards::getWildcards();
    $this->routes = Routes::getRoutes();

    // is the username in the correct format
    $this->username = $this->matchUsername();
    if ( !$this->username ) {
      $this->route = Routes::getRoute('signin');
      return;
    }

    // strip the username from data.
    array_shift($this->data);
    // re-assemble path string
    $this->routePath = implode("/", $this->data);

    $this->route = $this->determineCorrectRoute();
    $this->setArguments();
  }

  private function determineCorrectRoute()
  {
    $wildcardKeys = array_keys($this->wildcards);
    $wildcardPatterns = array_values($this->wildcards);
    $routekeys = implode("|", array_keys($this->routes));

    // str_replace(search for, replace with, in subject)
    // swap wildcard string with related wildcard patterns for all routes.
    $domainRegex = str_replace($wildcardKeys, $wildcardPatterns, $routekeys);
    // escape forward slashes.
    $domainRegex = str_replace("/", "\/", $domainRegex);

    // seporate back to array
    $routePatterns = explode("|", $domainRegex);
    $routekeys = array_keys($this->routes);

    for ($i = 0; $i < count($routePatterns); $i++ ) {
      $route = $routePatterns[$i];

      if ( preg_match("/^($route)$/", $this->routePath))
      {
        $this->routeMatch = $routekeys[$i];
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
      // search for domain on url array.
      // array_search(needle, haystack)
      $index = array_search($value, $args);
      unset($args[$index]);

      // search for domain on matched route.
      $index = array_search($value, $match);
      unset($match[$index]);
    }

    // find the action part in url data and the matched route string.
    // preg_grep(pattern, input)
    $this->action = preg_grep("/^{$this->wildcards[':action']}$/", $args);
    $matchAction = preg_grep("/^{$this->wildcards[':action']}$/", $match);
    if ( !empty($this->action) )
    {
      // convert action from array to string.
      // find action in url data.
      // remove from url data.
      $this->action = array_shift($this->action);
      $index = array_search($this->action, $args);
      unset($args[$index]);

      $matchAction = array_shift($matchAction);
      $index = array_search($matchAction, $match);
      unset($match[$index]);
    }

    // get the arguments from url data
    // get the key from the wildcard. :id, :yyyy, :dd,  etc.
    foreach ($args as $arg) {
      $key = $this->matchWildcard($match, $arg);
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
        // find matched wildcard and remove from possible wildcards.
        // array_search(needle, haystack)
        $index = array_search($key, $domainMatchedWildcards);
        unset($domainMatchedWildcards[$index]);
        return $key;
      }
    }
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