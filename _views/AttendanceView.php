<?php

class AttendanceView implements View
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
    $this->data['entity'] = "Attendance";
    $this->data['modules'] = $this->model->getAttendanceModules();
    $this->data['summary'] = $this->model->getAttendanceSummary();
    $this->data['totals'] = $this->model->getSummaryTotals();
    // $this->data['weeks'] = $this->model->getAttendanceWeeks();
    $this->data['days'] = $this->model->getSessionDays();
    $this->data['history'] = $this->model->getAttendanceHistory();
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/attendance-summary.php";
    include "_templates/attendance-history.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}