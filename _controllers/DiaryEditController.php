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

    if ( method_exists($this->model, $action) )
    {
      call_user_func(array($this->model, $action));
    }

    $this->view->getData();

    // If AJAX request
    if ( Input::server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest' )
    {
      // serve only the required content area.
      $this->view->getCoreContentArea();
    } else {
      // display the standard page.
      $this->view->display();
    }
  }
}