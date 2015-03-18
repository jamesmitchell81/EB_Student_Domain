<?php namespace Configuration;

/*
 * wildcard regex conversion reference.
 * add new wildcards to the constructer
 * below in the following format.
 * $wildcard['wildcard'] = 'regular expression';
 * concept used by code-igniter
 * [http://www.codeigniter.com/userguide3/general/routing.html#wildcards]
*/

class Wildcards
{
  private static $wildcards = [];

  private function __construct()
  {
    static::$wildcards[':username'] = '(\d{8})';        // 8 numbers
    static::$wildcards[':yyyy']     = '(\d{4})';        // 4 numbers
    static::$wildcards[':mm']       = '(\d{2})';        // 2 numbers
    static::$wildcards[':dd']       = '(\d{2})';        // 2 numbers
    static::$wildcards[':action']   = '(^[a-zA-z]+$)';  // one or more letters only, no spaces.
  }

  public static function getWildcards()
  {
    new static();
    return static::$wildcards;
  }
}
