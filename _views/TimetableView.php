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

  public function getData()
  {

  }

  public function display()
  {
    ob_start();
    include "_templates/head.php";
    include "_templates/logo-column.php";
    include "_templates/header-nav.php";
    include "_templates/content-header.php";
    include "_templates/timetable.php";
    include "_templates/content-end.php";
    include "_templates/footer.php";
    include "_templates/page-end.php";
    ob_end_flush();
  }
}