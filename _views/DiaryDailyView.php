<?php

class DiaryDailyView implements View
{
  private $model;
  private $data;
  private $date;
  private $username;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['action'] = "View";
    $this->data['entity'] = "Diary <span class='diary-current'>{$this->model->getDate()->format('l jS F Y')}</span>";
    $this->data['title'] = $this->model->getDate()->format('l jS F Y');
    $this->data['today'] = $this->model->getDate();
    $this->data['hours'] = ["08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"];
    $this->data['diary'] = $this->model->getDiaryEvents();
    $this->data['last'] = [ "href" => $this->model->getDiaryPath(-1), "date" => $this->model->getDate(-1)->format('Y-m-d')];
    $this->data['next'] = ["href" => $this->model->getDiaryPath(1), "date" => $this->model->getDate(1)->format('Y-m-d')];
    $this->data['add-link'] = $this->model->getDiaryAddPath();
    $this->data['types'] = $this->model->getDiaryTypes();
  }

  public function display()
  {
    // ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/diary-controls.php";
    include "_templates/diary-types.php";
    include "_templates/diary-day.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    // ob_end_flush();
  }
}