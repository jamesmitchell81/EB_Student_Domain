<?php

// Jeffery Way, Laracasts. Object Calethetics(!). Wrap your primitives.

class Time
{

  public static function fromDays($t)
  {
    return ((($t * 60) * 60) * 24);
  }

  public static function fromHours($t)
  {
    return ($t * 60) * 60;
  }

  public static function fromMinutes($t)
  {
    return $t * 60;
  }

  public static function toDays($t)
  {
    return self::toHours($t) / 24;
  }

  public static function toHours($t)
  {
    return self::toMinutes($t) / 60;
  }

  public static function toMinutes($t)
  {
    return $t / 60;
  }
}