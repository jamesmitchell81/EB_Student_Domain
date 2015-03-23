<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class NotificationsView implements View
{
  private $buffer;
  private $model;
  private $viewPath = '_templates/notifications.php';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);
    $data = $this->model->getNotifications();

    $this->buffer->addData('notifications', $data);

    $this->buffer->buff();
  }
}