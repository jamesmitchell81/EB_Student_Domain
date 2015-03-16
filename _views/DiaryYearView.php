<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class DiaryYearView implements View
{
  private $buffer;
  private $viewPath = '_templates/diary-year.php';

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