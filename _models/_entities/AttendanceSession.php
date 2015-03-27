<?php

class AttendanceSession
{
  private $date;
  private $result;

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function setResult($result)
  {
    $this->result = $result;
  }

  public function getResult()
  {
    return $this->result;
  }
}