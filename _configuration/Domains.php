<?php namespace Configuration;

/*
 * white list of all available domains.
*/

class Domains
{
  private static $domains = ['signin', 'diary', 'personal-details', 'timetables', 'modules', 'assignments'];

  public static function getDomainsWhitelist()
  {
    return static::$domains;
  }
}