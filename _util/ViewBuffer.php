<?php

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

  public function addData($key, $data)
  {
    $this->data[$key] = $data;
    return $this;
  }

  public function addPageSection()
  {

  }

  public function buff()
  {
    ob_start();
    include "{$this->defaultViewPath}{$this->view}";
    ob_end_flush();
    // @ob_end_clean();
  }
}




?>