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
    if ( method_exists($this->model, $action) && is_callable(array($this->model, $action)) )
    {
      call_user_func(array($this->model, $action));
    }

    $this->view->getData();

    if ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
    {
      $this->view->getCoreContentArea();
    } else {
      $this->view->display();
    }

  }
}