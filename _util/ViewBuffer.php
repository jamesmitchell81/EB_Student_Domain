<?php namespace Util;

// object to array.
// get object vars.

class ViewBuffer
{
  private $view;
  private $defaultViewPath = "_views/";
  private $data = [];

  public function __construct($view = '')
  {
    $this->view = $view;
    return $this;
  }

  public function addData($data)
  {
    $this->data = $data;

    // if is an object.
    return $this;
  }

  public function buff()
  {
    // extract($this->data);
    ob_start();
    include "{$this->defaultViewPath}{$this->view}";
    ob_end_flush();
    // @ob_end_clean();
  }
}




?>