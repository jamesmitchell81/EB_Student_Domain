<?php

include_once './_database/DatabaseQuery.php';
include_once './_dao/TimetableDAO.php';
include_once './_util/Time.php';

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

  public function getWeek($offset = 0)
  {
    $dt = new DateTime();
    $dt->setDate((int)$this->args[':yyyy'], (int)$this->args[':mm'], (int)$this->args[':dd']);

    if ( $offset == 0 )
    {
      return $this->setDateToMonday($dt);
    }

    if ( $offset > 0 ) {
      $dt->modify("+7 days");
      return $this->setDateToMonday($dt);
    }

    if ( $offset < 0 )
    {
      $dt->modify("-7 days");
      return $this->setDateToMonday($dt);
    }
  }

  public function getPath($offset = 0)
  {
    $dt = $this->getWeek($offset);
    return BASE_PATH . "$this->username/timetable/{$dt->format('Y/m/d')}";
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
    // monday = ((date - weekday number) - 2 )
    $weekday = (int)date('w', strtotime($date->format('Y-m-d')));
    if ( $weekday == 1 ) return $date;
    $weekday -= 1;
    $weekday = abs($weekday);
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
    $endDate = $startDate + Time::fromDays(5);

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

    // Make the date and integer value.
    $startDate = strtotime($startDate->format('Y-m-d'));
    $endDate = $startDate + Time::fromDays(5);

    $db = new DatabaseQuery();
    $db->select('SELECT MIN(StartTime) AS Earliest, MAX(EndTime) AS Latest FROM Timetable');
    $data = $db->first();

    if ( $data ) extract($data);
    $startTime = strtotime($Earliest);
    $endTime = strtotime($Latest) + Time::fromHours(1);

    $timespaces = [];

    while ( ( Time::toMinutes($endTime - $startTime) + Time::fromMinutes(15) ) > 0 )
    {
      $startDateTemp = $startDate;
      while ( Time::toDays($endDate - $startDateTemp) > 0 )
      {
        // $timespaces["08:00"]["Mon"] = "Mon 08:00";
        $timespaces[date('H:i', $startTime)][date('D', $startDateTemp)] = date('D', $startDateTemp) . " " . date('H:i', $startTime);
        $startDateTemp += Time::fromDays(1);
      }
      $startTime += Time::fromMinutes(15);
    }

    return $timespaces;
  }
}


