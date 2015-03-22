<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class ModuleView implements View
{
  private $buffer;
  private $model;
  private $viewPath = '_templates/modules.php';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);
    $data = $this->model->getModules();

    $this->buffer->addData($data);
    $this->buffer->buff();
  }
}