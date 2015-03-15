<?php namespace Util

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

  public static function get($key = '')
  {
    if ( $key == '' ) 
    {
      return cleanArray($_GET);
    }

    if ( isset($_GET[$key]) )
    {
      return clean($_GET[$key]);
    }
    return false;
  }

  public static function post($key = '')
  {
    if ( $key == '' ) 
    {
      return cleanArray($_POST);
    }

    if ( isset($_POST[$key]) )
    {
      return clean($_POST[$key]);
    }
    return false;
  }

  public static function session($key = '')
  {
    if ( $key == '' )
    {
      return cleanArray($_SESSION);
    }

    if ( isset($_SESSION[$key]) )
    {
      return clean($_SESSION[$key]);
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