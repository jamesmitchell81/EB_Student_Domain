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

  public function getDaysOfTheWeek()
  {
    return ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
  }

  /**
   * Create list of months.
   * 6 prior to current month.
   * 10 after.
   */
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

  private function getTimetable($date)
  {
    $dao = new TimetableDAO();
    return $dao->selectUserTimetableEvent($this->username, $date->format('Y-m-d'));
  }

  private function getEvents($date)
  {
    $dao = new EventDAO();
    return $dao->getUserEventsByDay($this->username, $date->format('Y-m-d'));
  }


  private function getDiary($date)
  {
    $this->diary = new Diary;

    foreach ($this->getTimetable($date) as $event) {
      $this->diary->addEvent($event);
    }

    foreach ($this->getEvents($date) as $event) {
      $this->diary->addEvent($event);
    }

    return $this->diary;
  }

  /**
   * Create the base stucture
   * of the calender month.
   */
  public function getCalender()
  {
    $monthNum = (int)$this->firstDayOfMonth->format('m');
    $yearNum = (int)$this->firstDayOfMonth->format('Y');
    $date = clone $this->firstDayOfMonth;

    // gets days in month.
    $days = date('t', mktime(0, 0, 0, $monthNum, 1, $yearNum));
    $rows = ($days / 7) + 1;

    $calender = [];
    $daysOfWeek = $this->getDaysOfTheWeek();

    $row = 0;
    while ( $date->format('M') == $this->firstDayOfMonth->format('M') )
    {

      foreach ($daysOfWeek as $day) {
        if ( $date->format('D') == $day && $date->format('M') == $this->firstDayOfMonth->format('M') )
        {

          $calender[$row][$day] = [
                  "href"   => BASE_PATH . "{$this->username}/diary/{$date->format('Y/m/d')}",
                  "date"   => $date->format('Y/m/d'),
                  "events" => $this->getDiary($date)
                  ];

          $date->modify("+1 days");
        }  else {
          $calender[$row][$day] = "";
        }
      }
      $row++;
    }

    return $calender;
  }
}