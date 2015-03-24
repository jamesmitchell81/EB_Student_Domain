<?php

include './_util/ViewBuffer.php';

use Util\ViewBuffer;

class StudentDetailsView implements View
{
  private $buffer;
  private $model;
  private $viewPath = '_templates/student-details.php';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function display()
  {
    $this->buffer = new ViewBuffer($this->viewPath);

    $data = $this->model->getStudentDetails();
    $this->buffer->addData('details', $data);

    $this->buffer->buff();
  }
}