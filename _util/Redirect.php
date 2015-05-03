<?php

/**
 * Allow for cleaner implementation
 * When redirect are required.
 */
class Redirect
{
  private $base = BASE_PATH;

  private function __construct($to = '')
  {
    $username = Input::session('username');
    $newPath = "{$this->base}{$username}/{$to}";

    header("Location: {$newPath}");
    exit();
  }

  public static function to($to = '')
  {
    new static($to);
  }

}