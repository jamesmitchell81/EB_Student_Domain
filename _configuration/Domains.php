<?php namespace Configuration;

/*
 * white list of all available domains.
*/

class Domains
{
  private static $domains = ['diary', 'personal-details', 'timetables', 'modules', 'assignments'];

  public static function getDomainsWhitelist()
  {
    return static::$domains;
  }
}