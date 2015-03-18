<?php

class DiaryDailyModel
{
  private $year;
  private $month;
  private $day;

  private $date;

  public function __construct($args = [])
  {
    $this->year = array_shift($args);
    $this->month = array_shift($args);
    $this->day = array_shift($args);

    $this->date = new DateTime();
    $this->date->setDate($this->year, $this->month, $this->day);
  }

  public function getDate()
  {
    return $this->date->format('l jS, M Y');
  }
}