<?php

include './_dao/TimetableDAO.php';

class DiaryDailyModel
{
  private $year;
  private $month;
  private $day;

  private $date;

  private $username;

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

  private function getTimetable()
  {
    $username = Input::session('username');
    $dao = new TimetableDAO();
    return $dao->selectUserTimetableDate($username, $this->date);
  }

  public function getDiaryEvents()
  {
    // temp...
    return $this->getTimetable();
  }
}