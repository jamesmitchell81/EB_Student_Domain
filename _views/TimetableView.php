<?php

include '_util/ViewBuffer.php';

use Util\ViewBuffer;

class TimetableView implements View
{
  private $buffer;
  private $viewPath = '_templates/timetable.php';

  public function __construct()
  {
    echo static::class;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $this->buffer->buff();
  }
}