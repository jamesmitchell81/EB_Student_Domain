<?php namespace Util;

class Redirect
{
  // temp.
  // http://stackoverflow.com/questions/768431/how-to-make-a-redirect-in-php
  private $base = '/~jm/group_project/';

  private function __construct($to = '')
  {
    $username = Input::session('username');
    $newPath = "{$this->base}/{$username}/{$to}";

    var_dump($newPath);
    header("Location: {$newPath}");
    exit();
  }

  public static function to($to = '')
  {
    new static($to);
  }

}