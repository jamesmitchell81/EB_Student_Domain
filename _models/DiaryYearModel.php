<?php

class DiaryYearModel
{
  private $year;
  private $startDate;

  public function __construct($args = [])
  {

    $this->year = array_shift($args);

    $date = new DateTime();
    $this->startDate = $date->setDate($this->year, 1, 1);

    var_dump($this->startDate);
  }

  public function getYear()
  {
    return $this->year;
  }

}

// echo date("Y/m/d", strtotime("{$this->year}/01/01"));