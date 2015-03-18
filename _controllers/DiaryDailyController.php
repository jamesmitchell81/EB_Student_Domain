<?php // namespace Controllers;

class DiaryDailyController
{
  private $model;
  private $view;

  public function __construct($model, View $view)
  {
    $this->model = $model;
    $this->view = $view;

    $this->view->display();
  }
}