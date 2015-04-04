<?php

class SignInView implements View
{
  private $model;
  private $data;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['title'] = "Sign in";
    $this->data['scripts'] = [];
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/signin.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }

}