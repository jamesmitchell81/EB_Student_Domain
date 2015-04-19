<?php

class AssignmentFrontSheetView implements View
{
  private $model;
  private $data;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['action'] = "View";
    $this->data['entity'] = "Assignments";
    $this->data['student'] = $this->model->getStudentDetails();
    $this->data['assignments'] = $this->model->getAssignments();

    $this->data['scripts'] = [];
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/assignment-frontsheet.php";
    include "_templates/assignments.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}