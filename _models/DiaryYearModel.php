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

    // build up the months.

    /*
    ['2015']['January']['Mon']['']

    */
  }

  public function getStartDate()
  {
    return $this->startDate;
  }

  public function getYear()
  {
    return $this->year;
  }

}

// echo date("Y/m/d", strtotime("{$this->year}/01/01"));