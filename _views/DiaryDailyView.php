<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class DiaryDailyView implements View
{
  private $viewPath = '_templates/diary-day.php';
  private $buffer;
  private $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $data = ["08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"];

    // $this->model->getDiaryEvents();
    // $this->model->getAssignmentEvents();
    $timetable = $this->model->getDiaryEvents();

    $this->buffer->addData('today', $this->model->getDate());
    $this->buffer->addData('hours', $data);
    $this->buffer->addData('timetable', $timetable);

    $this->buffer->buff();
  }
}