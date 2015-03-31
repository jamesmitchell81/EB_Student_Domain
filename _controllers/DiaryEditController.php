<?php

class DiaryEditController
{
  private $view;
  private $model;

  public function __construct($model, View $view)
  {
    $this->view = $view;
    $this->model = $model;

    $action = $this->model->getAction();
    $this->model->$action();

    $this->view->getData();
    $this->view->display();
  }
}