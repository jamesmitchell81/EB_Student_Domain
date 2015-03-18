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

    $data["today"] = $this->model->getDate();
    $data["hours"] = ["08:00", "09:00", "10:00", "11:00", "12:00", "13:00",
                      "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"];

    $this->buffer->addData($data);

    $this->buffer->buff();
  }
}