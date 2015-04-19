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
    $this->data['current'] = $this->model->getWeek(1)->format('Y-m-d');
    $this->data['next'] = [ "href" => $this->model->getPath(1), "date" => $this->model->getWeek(1)->format('Y-m-d')];
    $this->data['last'] = [ "href" => $this->model->getPath(-1), "date" => $this->model->getWeek(-1)->format('Y-m-d')];
    $this->data['timespaces'] = $this->model->getTimespaces();
    $this->data['timetable'] = $this->model->getTimetable();

    $this->data['scripts'] = [];
  }

  public function display()
  {
    include "_templates/head.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/timetable-control.php";
    include "_templates/timetable.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
  }
}