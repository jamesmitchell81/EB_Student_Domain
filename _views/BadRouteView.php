<?php

class BadRouteView implements View
{
  private $model;
  private $data;

  public function __construct(BadRouteModel $model)
  {
    $this->model = $model;
  }

  public function getData()
  {

    // if ( $this->model->isValidUser() && $this->model->userIsSignedIn() )
    // {
    //   $data = $this->model->getUsername;
    //   $this->buffer->addData('home', $data);
    // } else {
    //   $data = "signin";
    //   $this->buffer->addData('home', $data);
    // }
    $this->data['action'] = "Sorry";
    $this->data['entity'] = "This page does not exist";
    $this->data['home'] = "signin";

    $this->data['scripts'] = [];
  }

  public function display()
  {
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/404.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
  }

}