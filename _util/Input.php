<?php namespace Util;

class Input
{
  private function __construct()
  {

  }

  private function clean($value = '')
  {
    // do clean ..

    return $value;
  }

  private function cleanArray($array = [])
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
    if ( $key == '' )
    {
      return static::cleanArray($_GET);
    }

    if ( isset($_GET[$key]) )
    {
      return static::clean($_GET[$key]);
    }
    return false;
  }

  public static function post($key = '')
  {
    if ( $key == '' )
    {
      return static::cleanArray($_POST);
    }

    if ( isset($_POST[$key]) )
    {
      return static::clean($_POST[$key]);
    }
    return false;
  }

  public static function session($key = '')
  {
    if ( $key == '' )
    {
      return static::cleanArray($_SESSION);
    }

    if ( isset($_SESSION[$key]) )
    {
      return static::clean($_SESSION[$key]);
    }
    return false;
  }

  public static function cookie($key = '')
  {

  }

  public static function server($key = '')
  {

  }

  public static function input()
  {

  }

}