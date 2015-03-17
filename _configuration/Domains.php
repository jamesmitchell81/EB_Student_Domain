<?php namespace Configuration;

/*
 * white list of all available domains.
*/

class Domains
{
  private static $domains = ['signin', 'diary', 'personal-details', 'timetable', 'modules', 'assignments', 'notifications'];

  public static function getDomainsWhitelist()
  {
    return static::$domains;
  }
}