<?php

include '_util/ViewBuffer.php';

use Util\ViewBuffer;

class BadRouteView implements View
{
  private $model;
  private $buffer;
  private $viewPath = '_templates/404.php';

  public function __construct(BadRouteModel $model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    if ( $this->model->isValidUser() && $this->model->userIsSignedIn() )
    {
      $data = $this->model->getUsername;
      $this->buffer->addData('home', $data);
    } else {
      $data = "signin";
      $this->buffer->addData('home', $data);
    }

    $this->buffer->buff();
  }

}