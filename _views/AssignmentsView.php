<?php

class AssignmentsView implements View
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
    $this->data['summary'] = $this->model->getAssignmentSummary();
    $this->data['assignments'] = $this->model->getAssignments();
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/assignment-summary.php";
    include "_templates/assignments.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}