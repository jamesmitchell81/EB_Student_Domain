<?php

class DiaryMonthView implements View
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
    $this->data['entity'] = "Diary";

    // $this->data['diary'] = $this->model->getDiaryEvents();
    $this->data['heat'] = ["#55ff55", "#78ff78","#98ff98","#caffca","#efffef"];
    $this->data['months'] = $this->model->getMonthRange();
    $this->data['month'] = $this->model->getMonth();
    $this->data['calender'] = $this->model->getCalender();
    $this->data['days'] = $this->model->getDaysOfTheWeek();
  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/diary-month-title.php";
    include "_templates/diary-month-tabs.php";
    include "_templates/diary-month.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}