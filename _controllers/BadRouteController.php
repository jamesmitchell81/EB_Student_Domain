<?php

class BadRouteController
{
  private $model;
  private $view;

  public function __construct(BadRouteModel $model, View $view)
  {
    $this->model = $model;
    $this->view = $view;

    $this->view->display();
  }
}