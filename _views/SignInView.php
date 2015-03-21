<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class SignInView implements View
{
  private $buffer;
  private $viewPath = "_templates/signin.php";

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $this->buffer->buff();
  }

}