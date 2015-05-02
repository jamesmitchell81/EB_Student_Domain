<?php

class NotificationsController
{
  private $model;
  private $view;

  public function __construct($model, View $view)
  {
    $this->model = $model;
    $this->view = $view;

    $action = $this->model->getAction();

    if ( method_exists($this->model, $action) )
    {
      call_user_func([$this->model, $action]);
    }

    $this->view->getData();

    if ( Input::server('HTTP_X_REQUESTED_WITH') != 'XMLHttpRequest' )
    {
      $this->view->display();
    }
  }
}