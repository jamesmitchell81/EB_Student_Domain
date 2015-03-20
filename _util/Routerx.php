<?php namespace Util;

// https://r.je/mvc-php-front-controller.html.
// include('./_util/Input.php');

include('./_configuration/Routes.php');
include('./_configuration/Domains.php');
include('./_configuration/Wildcards.php');

use Configuration\Routes;
use Configuration\Domains;
use Configuration\Wildcards;

class Routerx
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

    // check if username.
    $this->username = $this->matchUsername();
    if ( $this->username ) array_shift($this->data);

    // reconstruct data.
    $this->routePath = implode("/", $this->data);

    $this->domain = $this->matchDomain();

    if ( strlen($this->domain) == 0 )
    {
      // exit;
    }

    // $this->action = $this->matchAction();

    // diary/:yyyy/:mm/:dd
    // diary, #^\d{4}$#, #^\d{2}$, #^\d{2}$

    $this->routeOnNullParameters();
    $this->extractArguments();

    if ( !$this->domain )   $this->route = Routes::getRoute('404');
    if ( !$this->username ) $this->route = Routes::getRoute('signin');
    var_dump($this->route);
  }

  private function routeOnNullParameters()
  {
    $keys = implode("|", array_keys($this->routes));
    if ( preg_match("/({$this->domain})/", $keys) && empty($this->data) )
    {
      if ( array_key_exists($this->domain, $this->routes) )
      {
        $this->route = $this->routes[$this->domain];
      } else {
        $this->route = Routes::getRoute('home');
      }
    }
  }

  private function extractArguments()
  {
    $domainRegex = $this->wildcardsToRegex();
    if ( preg_match("/^{$domainRegex}$/", $this->routePath) )
    {
      var_dump($this->data);
      // $this->route = $this->routes[$this->domain];
      // gleen all of the arguments.
      while ( !empty($this->data) )
      {
        $this->arguments[] = array_pop($this->data);
      }
    }
  }

  private function wildcardsToRegex()
  {
    // "diary/:yyyy/:mm/:dd" becomes "diary\//^\d{4}$#\//^\d{2}$\//^\d{2}$
    $wildcardKeys = array_keys($this->wildcards);
    $wildcardPatterns = array_values($this->wildcards);
    $routekeys = implode("|", array_keys($this->routes));

    // replace wildcard keys with wildcard patters in route keys.
    $domainRegex = str_replace($wildcardKeys, $wildcardPatterns, $routekeys);
    // escape slashes in url.
    $domainRegex = str_replace("/", "\/", $domainRegex);
    return $domainRegex;
  }

  private function matchDomain()
  {
    $data = explode("/", $this->routePath);
    $domains = implode("|", array_values($this->domains));
    $domain = preg_grep("/$domains/", $data);
    $domain = implode("", $domain);



    return $domain;
  }

  private function matchUsername()
  {
    $data = explode("/", $this->routePath);
    $value = preg_grep("/^{$this->wildcards[':username']}$/", $data);

    return implode("", $value);
  }

  private function matchAction()
  {
    if ( empty($this->data) ) return '';
    $match = preg_match("/^{$this->wildcards[':action']}$/", $this->data[0]);

    if ( !$match )
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
