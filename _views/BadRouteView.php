<?php

include '_util/ViewBuffer.php';

use Util\ViewBuffer;

class BadRouteView
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
      $data["home"] = $this->model->getUsername;
    } else {
      $data["home"] = "signin";
    }

    $this->buffer->addData($data);
    $this->buffer->buff();
  }

}