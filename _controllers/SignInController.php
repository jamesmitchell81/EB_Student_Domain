<?php

require_once './_util/Redirect.php';

class SignInController
{
  private $model;
  private $view;

  public function __construct($model, View $view)
  {
    if ( session_status() == PHP_SESSION_ACTIVE)
    {
      session_destroy();
      $_SESSION = [];
    }

    $this->model = $model;
    $this->view = $view;

    if ( Input::post() )
    {
      if ( $this->model->authorised() )
      {
        session_start();
        $_SESSION['username'] = $this->model->getUsername();
        Redirect::to('notifications');
      } else {
        $this->view->setErrors($this->model->getErrors());
        $this->view->setEnteredUsername(Input::post('username'));
      }
    }

    $this->view->getData();
    $this->view->display();
  }
}