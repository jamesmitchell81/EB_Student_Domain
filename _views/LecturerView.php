<?php

class LecturerView implements View
{
  private $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['action'] = "View";
    $this->data['entity'] = "Lecturers";
    $this->data['lecturer-details'] = $this->model->getLecturerDetails();

    $this->data['scripts'] = [];
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/lecturer.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }

}