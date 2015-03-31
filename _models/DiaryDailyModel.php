<?php

include '_entities/Diary.php';
include './_dao/TimetableDAO.php';

class DiaryDailyModel
{
  private $year;
  private $month;
  private $day;

  private $date;
  private $username;

  private $diary;

  public function __construct($args = [])
  {
    $this->year = $args[':yyyy'];
    $this->month = $args[':mm'];
    $this->day = $args[':dd'];

    $this->date = new DateTime();
    $this->date->setDate($this->year, $this->month, $this->day);
    $this->username = Input::session('username');
  }

  public function getDate($format = '')
  {
    if ( $format == '' )
    {
      return $this->date->format('Y-m-d H:i:s');
    }
    return $this->date->format($format);
  }

  private function getTimetable()
  {
    $dao = new TimetableDAO();
    return $dao->selectUserTimetableEvent($this->username, $this->date->format('Y-m-d'));
  }

  public function getDiaryEvents()
  {
    $this->diary = new Diary;

    foreach ($this->getTimetable() as $event) {
      $this->diary->addEvent($event);
    }

    return $this->diary;
  }

  public function getDiaryAddPath()
  {
    $date = $this->date->format('Y/m/d');
    return BASE_PATH . "$this->username/diary/add/$date";
  }
}