<?php namespace Util

class Input
{

  private function __construct()
  {

  }

  private function clean($value)
  {
    // do clean ..

    return $value;
  }

  public static function get($key)
  {
    if ( isset($_GET[$key]) )
    {
      return clean($_GET[$key]);
    }
    return false;
  }

  public static function post($key)
  {
    if ( isset($_POST[$key]) )
    {
      return clean($_POST[$key]);
    }
    return false;
  }

  public static function session($key)
  {
    //
  }

  public static function server($key)
  {

  }

}