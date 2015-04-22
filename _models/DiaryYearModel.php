<?php

include_once './_dao/EventDAO.php';
include_once './_dao/TimetableDAO.php';
include_once './_models/_entities/Diary.php';

class DiaryYearModel
{
  private $args;
  private $year;
  private $firstDayOfYear;
  private $username;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->year = $args[':yyyy'];

    $date = new DateTime();
    $this->firstDayOfYear = $date->setDate($this->year, 1, 1);

    $this->username = Input::session('username');
  }

  public function getStartDate()
  {
    return $this->startDate;
  }

  public function getYear($offset = 0)
  {
    if ( $offset == 0) return $this->year;

    $newDate = clone $this->firstDayOfYear;

    if ( $offset > 0 ) {
      $newDate->add(new DateInterval("P{$offset}Y"));
    }

    if ( $offset < 0 ) {
      $offset = abs($offset);
      $newDate->sub(new DateInterval("P{$offset}Y"));
    }

    return $newDate;
  }

  public function getDiaryPath($offset = 0)
  {
    if ( $offset == 0) return BASE_PATH . "$this->username/diary/$this->date->format('Y')";

    $newDate = clone $this->firstDayOfYear;

    if ( $offset > 0 ) {
      $newDate->add(new DateInterval("P{$offset}Y"));
    }

    if ( $offset < 0 ) {
      $offset = abs($offset);
      $newDate->sub(new DateInterval("P{$offset}Y"));
    }

    return BASE_PATH . "$this->username/diary/{$newDate->format('Y')}";
  }


  public function getCalenderYear()
  {
    $range = [];
    $tempDate = clone $this->firstDayOfYear;

    for ( $i = 0; $i < 12; $i++ )
    {
      // $range[$tempDate->format('F Y')] = BASE_PATH . "{$this->username}/diary/{$tempDate->format('Y/m')}";
      $range[$tempDate->format('F Y')] = $this->getCalender($tempDate);
      $tempDate->add(new DateInterval('P1M'));
    }

    return $range;
  }

  public function getMonths()
  {
    $range = [];
    $tempDate = clone $this->firstDayOfYear;

    for ( $i = 0; $i < 12; $i++ )
    {
      // $range[$tempDate->format('F Y')] = BASE_PATH . "{$this->username}/diary/{$tempDate->format('Y/m')}";
      $range[] = [
        "title" => $tempDate->format('F Y'),
        "href"  => BASE_PATH .  "{$this->username}/diary/{$tempDate->format('Y/m')}"
        ];
      $tempDate->add(new DateInterval('P1M'));
    }

    return $range;
  }

  public function getCalender($tempDate)
  {
    $firstDayOfMonth = clone $tempDate;
    $dt = clone $tempDate;

    $monthNum = (int)$dt->format('m');
    $yearNum = (int)$this->year;

	$days = date('t', mktime(0, 0, 0, $monthNum, 1, $yearNum));
/*     $days = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum); //http://php.net/manual/en/function.cal-days-in-month.php */
    $rows = ($days / 7) + 1;

    $calender = [];

    $daysOfWeek = $this->getDaysOfTheWeek();

    $row = 0;
    while ( $dt->format('M') == $firstDayOfMonth->format('M') )
    {

      foreach ($daysOfWeek as $day) {
        if ( $dt->format('D') == $day && $dt->format('M') == $firstDayOfMonth->format('M') )
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


}

