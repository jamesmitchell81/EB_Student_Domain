<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class DiaryYearView implements View
{
  private $buffer;
  private $viewPath = '_templates/diary-year.php';
  private $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $data["entity"] = $this->model->getYear();
    $data["start"] = $this->model->getStartDate();

    $this->buffer->addData($data);
    $this->buffer->buff();
  }
}