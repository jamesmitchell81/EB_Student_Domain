<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class SignInView implements View
{
  private $buffer;
  private $viewPath = "_templates/signin.php";

  public function __construct()
  {
    echo static::class;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $this->buffer->buff();
  }

}