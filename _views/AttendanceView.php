<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class AttendanceView implements View
{
  private $viewPath = '_templates/attendance.php';
  private $buffer;
  private $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $data = $this->model->getAttendanceSummary();

    $this->buffer->addData('summary', $data);

    $this->buffer->buff();
  }
}