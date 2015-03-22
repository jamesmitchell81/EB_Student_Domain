<?php //namespace Controllers;

class NotificationsController
{
  private $model;
  private $view;

  public function __construct($model, View $view)
  {
    $this->model = $model;
    $this->view = $view;

    $action = $this->model->getAction();
    // http://php.net/manual/en/function.method-exists.php
    // http://stackoverflow.com/questions/19537423/check-if-function-exists-in-class-before-calling-call-user-func
    if ( method_exists($this->model, $action) && is_callable(array($this->model, $action)) )
    {
      call_user_func(array($this->model, $action));
    }

    $this->view->display();
  }
}