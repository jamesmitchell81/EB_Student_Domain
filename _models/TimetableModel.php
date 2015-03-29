<?php

include_once './_database/DatabaseQuery.php';

class TimetableModel
{
  private $username;
  private $args;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  private function setDateToWeekday($date)
  {
    while ( $date->format("D") == 'Sat' || $date->format("D") == 'Sun' )
    {
      $date->modify("+1 day");
    }
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

  public function getTimespaces()
  {
    $db = new DatabaseQuery();
    $db->select('SELECT MIN(StartTime) AS Earliest, MAX(EndTime) AS Latest FROM Timetable');
    $data = $db->first();

    if ( $data ) extract($data);

    // $parts = explode(":", $Earliest);
    // $start = new DateTime();
    // $start->setDate($this->args[":yyyy"], $this->args[':mm'], $this->args[':dd']);
    // $start = $this->setDateToWeekday($start);
    // $start->setTime($parts[0], $parts[1], $parts[2]);
    // var_dump($start);

    $start = strtotime($Earliest);
    $end = strtotime($Latest);

    while ( $start < $end )
    {
      $timespaces[] = $start;
      $start += (15 * 60);
    }

    var_dump($timespaces);
  }
}