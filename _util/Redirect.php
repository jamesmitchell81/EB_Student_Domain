<?php

class Redirect
{
  // temp.
  // http://stackoverflow.com/questions/768431/how-to-make-a-redirect-in-php
  private $base = BASE_PATH;

  private function __construct($to = '')
  {
    $username = Input::session('username');
    $newPath = "{$this->base}/{$username}/{$to}";

    header("Location: {$newPath}");
    exit();
  }

  public static function to($to = '')
  {
    new static($to);
  }

}