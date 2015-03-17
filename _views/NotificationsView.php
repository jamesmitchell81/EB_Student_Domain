<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class NotificationsView implements View
{
  private $buffer;
  private $viewPath = '_templates/notifications.php';

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