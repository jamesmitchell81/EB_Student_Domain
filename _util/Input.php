<?php

class Input
{
  private function __construct()
  {

  }

  private static function process($arr = [], $key = '')
  {
    if ( !isset($arr) ) return false;

    if ( $key == '' )
    {
      return static::cleanArray($arr);
    }

    if ( isset($arr[$key]) )
    {
      return static::clean($arr[$key]);
    }
    return false;
  }

  private static function clean($value = '')
  {

    return htmlentities($value);
  }

  private static function cleanArray($array = [])
  {
    $newArray = [];
    foreach ($array as $key => $value)
    {
      $newArray[$key] = static::clean($value);
    }
    return $newArray;
  }

  public static function get($key = '')
  {
    return static::process($_GET, $key);
  }

  public static function post($key = '')
  {
    return static::process($_POST, $key);
  }

  public static function session($key = '')
  {
    if ( !isset($_SESSION) ) return false;
    return static::process($_SESSION, $key);
  }

  public static function cookie($key = '')
  {
    return static::process($_COOKIE, $key);
  }

  public static function server($key = '')
  {
    return static::process($_SERVER, $key);
  }

  public static function input()
  {

  }

}