<?php

include_once './_dao/EventDAO.php';
include_once './_dao/TimetableDAO.php';
include_once './_models/_entities/Diary.php';

class DiaryMonthModel
{
  private $username;
  private $args = [];
  private $month;
  private $firstDayOfMonth;

  public function __construct($args = [])
  {
    $this->args = $args;

    if ( !empty($this->args) ){
      $this->firstDayOfMonth = new DateTime();
      $this->firstDayOfMonth->setDate($this->args[':yyyy'], $this->args[':mm'], 1);
    }

    $this->username = Input::session('username');
  }

  public function getMonth()
  {
    return $this->firstDayOfMonth->format('F Y');
  }

  public function getMonthRange()
  {
    $range = [];
    $tempDate = clone $this->firstDayOfMonth;
    $tempDate->sub(new DateInterval('P6M'));

    for ( $i = 0; $i < 16; $i++ )
    {
      $tempDate->add(new DateInterval('P1M'));
      $range[$tempDate->format('F Y')] = BASE_PATH . "{$this->username}/diary/{$tempDate->format('Y/m')}";
    }

    return $range;
  }

  private function getTimetable($dt)
  {
    $dao = new TimetableDAO();
    return $dao->selectUserTimetableEvent($this->username, $dt->format('Y-m-d'));
  }

  private function getEvents($dt)
  {
    $dao = new EventDAO();
    return $dao->getUserEventsByDay($this->username, $dt->format('Y-m-d'));
  }

  private function getDiary($dt)
  {
    $this->diary = new Diary;

    foreach ($this->getTimetable($dt) as $event) {
      $this->diary->addEvent($event);
    }

    foreach ($this->getEvents($dt) as $event) {
      $this->diary->addEvent($event);
    }

    return $this->diary;
  }

  public function getCalender()
  {
    $monthNum = (int)$this->firstDayOfMonth->format('m');
    $yearNum = (int)$this->firstDayOfMonth->format('Y');
    $dt = clone $this->firstDayOfMonth;

    $days = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum); //http://php.net/manual/en/function.cal-days-in-month.php
    $rows = ($days / 7) + 1;

    $calender = [];

    $daysOfWeek = $this->getDaysOfTheWeek();

    $row = 0;
    while ( $dt->format('M') == $this->firstDayOfMonth->format('M') )
    {

      foreach ($daysOfWeek as $day) {
        if ( $dt->format('D') == $day && $dt->format('M') == $this->firstDayOfMonth->format('M') )
        {

          $calender[$row][$day] = [
                  "href"   => BASE_PATH . "{$this->username}/diary/{$dt->format('Y/m/d')}",
                  "date"   => $dt->format('Y/m/d'),
                  "events" => $this->getDiary($dt)
                  ];

          $dt->modify("+1 days");
        }  else {
          $calender[$row][$day] = "";
        }
      }
      $row++;
    }

    return $calender;
  }

  public function getDaysOfTheWeek()
  {
    return ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
  }

}