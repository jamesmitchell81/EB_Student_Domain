<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class DiaryDailyView implements View
{
  private $viewPath = '_templates/diary-day.php';
  private $buffer;

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