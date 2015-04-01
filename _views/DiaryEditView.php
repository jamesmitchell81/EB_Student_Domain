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
    $this->data['action-event'] = "insert"; //$this->model->getActionEvent();
    $this->data['event'] = $this->model->getEvent();
    // date
  }

  public function display($viewPath = '')
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/diary-edit.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}