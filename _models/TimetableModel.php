<?php

// date interval ref: http://php.net/manual/en/dateinterval.construct.php

include_once './_database/DatabaseQuery.php';
include_once './_dao/TimetableDAO.php';

class TimetableModel
{
  private $username;
  private $args;

  public function __construct($args = [])
  {
    $this->args = $args;

    if ( !$this->dateArgsSet() )
      $this->setDefaultDate();

    $this->username = Input::session('username');
  }

  private function dateArgsSet()
  {
    if ( !isset($this->args[':yyyy']) || !isset($this->args[':mm']) || !isset($this->args[':dd']) )
    {
      return false;
    }
    return true;
  }

  private function setDefaultDate()
  {
    $today = new DateTime();
    $this->args[':yyyy'] = (int)$today->format('Y');
    $this->args[':mm'] = (int)$today->format('m');
    $this->args[':dd'] = (int)$today->format('d');
  }

  private function setDateToWeekday($date)
  {
    while ( $date->format("D") == 'Sat' || $date->format("D") == 'Sun' )
      $date->modify("+1 day");

    return $date;
  }

  private function setDateToMonday($date)
  {
    // ((date - weekday) - 2 )
    $weekday = (int)date('w', strtotime($date->format('Y-m-d')));
    if ( $weekday == 1 ) return $date;
    $weekday -= 1;
    $interval = "P{$weekday}D";
    $date->sub(new DateInterval($interval));
    return $date;
  }

  private function getTimetableWeek($date)
  {
    $date = $this->setDateToWeekday($date);

    $db = new DatabaseQuery();
    $db->setStr('date', $data->format('Y-m-d'));
    $db->select('SELECT DISTINCT DATE_SUB(s.Date, INTERVAL (DAYOFWEEK(s.Date) - 2) DAY) WeekStart,
                                 DATE_ADD(s.Date, INTERVAL ((DAYOFWEEK(s.Date) - 2) + 5) DAY) WeekEnd
                 FROM Session s
                 WHERE s.Date = :date');
  }

  public function getTimetable()
  {
    $startDate = new DateTime();
    $startDate->setDate($this->args[":yyyy"], $this->args[':mm'], $this->args[':dd']);
    $startDate = $this->setDateToMonday($startDate);

    $startDate = strtotime($startDate->format('Y-m-d'));
    $endDate = $startDate + $this->days(5);

    $timetable = [];
    $timespaces = $this->getTimespaces();

    $dao = new TimetableDAO();
    $timetable = $dao->selectUserTimetableWeek($this->username, date('Y-m-d', $startDate), date('Y-m-d', $endDate));

    return $timetable;
  }

  public function getTimespaces()
  {

    $startDate = new DateTime();
    $startDate->setDate($this->args[":yyyy"], $this->args[':mm'], $this->args[':dd']);
    $startDate = $this->setDateToMonday($startDate);

    $startDate = strtotime($startDate->format('Y-m-d'));
    $endDate = $startDate + $this->days(5);

    $db = new DatabaseQuery();
    $db->select('SELECT MIN(StartTime) AS Earliest, MAX(EndTime) AS Latest FROM Timetable');
    $data = $db->first();

    if ( $data ) extract($data);
    $startTime = strtotime($Earliest);
    $endTime = strtotime($Latest) + $this->hours(1);

    $timespaces = [];

    while ( ($this->minute($endTime - $startTime) + 15) > 0 )
    {
      $startDateTemp = $startDate;
      while ( $this->day($endDate - $startDateTemp) > 0 )
      {
        $timespaces[date('H:i', $startTime)][date('D', $startDateTemp)] = date('D', $startDateTemp) . " " . date('H:i', $startTime);
        $startDateTemp += $this->days(1);
      }

      $startTime += $this->minutes(15);
    }

    return $timespaces;
  }

  private function days($t)
  {
    return ((($t * 60) * 60) * 24);
  }

  private function hours($t)
  {
    return ($t * 60) * 60;
  }

  private function minutes($t)
  {
    return $t * 60;
  }

  private function day($t)
  {
    return $this->hour($t) / 24;
  }

  private function hour($t)
  {
    return $this->minute($t) / 60;
  }

  private function minute($t)
  {
    return $this->second($t) / 60;
  }

  private function second($t)
  {
    return $t - strtotime(date("Y-d-m")) / 1000;
  }
}