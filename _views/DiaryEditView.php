<?php

class DiaryEditView implements View
{
  private $model;
  private $data;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function getData()
  {
    $this->data['action'] = $this->model->getAction();
    $this->data['entity'] = "Diary";
    $this->data['action-event'] = $this->model->getAction();
    $this->data['event'] = $this->model->getEvent();

    $this->data['scripts'] = [];
  }

  public function getCoreContentArea()
  {
    include "_templates/diary-edit.php"; // just this is ajax.
  }

  public function display()
  {
    include "_templates/head.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";

    $this->getCoreContentArea();

    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
  }
}