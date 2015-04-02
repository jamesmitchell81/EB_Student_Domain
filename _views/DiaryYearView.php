<?php

class DiaryYearView implements View
{
  private $model;
  private $data;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data["action"] = "View";
    $this->data["entity"] = "Diary Year";
    $this->data['current'] = $this->model->getYear(0);
    $this->data['last'] = [ "href" => $this->model->getDiaryPath(-1), "date" => $this->model->getYear(-1)->format('Y')];
    $this->data['next'] = ["href" => $this->model->getDiaryPath(1), "date" => $this->model->getYear(1)->format('Y')];
    $this->data['days'] = $this->model->getDaysOfTheWeek();
    $this->data['months'] = $this->model->getMonths();
    $this->data['calender'] = $this->model->getCalenderYear();
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/diary-year-controls.php";
    include "_templates/diary-year.php";
    include "_templates/content-end.php";
    // include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}