<?php

include '_util/ViewBuffer.php';

use Util\ViewBuffer;

class DiaryEditView implements View
{
  private $buffer;
  private $model;
  private $viewPath = '_templates/diary-edit.php';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display($viewPath = '')
  {
    $this->buffer = new ViewBuffer($this->viewPath);
    $data['action'] = $this->model->getAction();

    $this->buffer->addData($data);

    $this->buffer->buff();
  }
}