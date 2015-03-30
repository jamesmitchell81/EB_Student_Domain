<?php

class TimetableView implements View
{
  private $buffer;
  private $viewPath = '_templates/timetable.php';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['title'] = "Timetables";
    $this->data['action'] = "View";
    $this->data['entity'] = "Timetables";
    $this->data['weekdays'] = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
    // $this->data['timespaces'] = $this->model->getTimespaces();
    $this->data['timespaces'] = $this->model->getTimespaces2();
    $this->data['timetable'] = $this->model->getTimetable();
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    // include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/tableworkout.php";
    // include "_templates/timetable.php";
    include "_templates/content-end.php";
    // include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}