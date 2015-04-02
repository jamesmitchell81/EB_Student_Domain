<?php

include '_entities/Diary.php';
include './_dao/TimetableDAO.php';
include './_dao/EventDAO.php';
include_once './_util/Time.php';

class DiaryWeekModel
{
  private $year;
  private $month;
  private $day;
  private $week;
  private $firstDayOfWeek;
  private $username;

  private $diary;

  public function __construct($args = [])
  {
    $this->week = $args[':week'];
    $this->year = $args[':yyyy'];

    preg_match('!\d+!', $this->week, $matches);
    $this->week = (int)$matches[0];
    $dt = $this->getFirstDayOfWeek($this->week, $this->year);

    $dt = strtotime($dt);
    $this->firstDayOfWeek = new DateTime();
    $this->firstDayOfWeek->setDate((int)date('Y', $dt), (int)date('m', $dt), (int)date('d', $dt));
    $this->username = Input::session('username');
  }

  private function getFirstDayOfWeek($weekNumber, $year)
  {
   // do not remove this reference.!!!!!
   // http://stackoverflow.com/questions/1659551/how-to-get-the-first-day-of-a-given-week-number-in-php-multi-platform
    $timestamp = mktime( 0, 0, 0, 1, 1,  $year ) + ( $weekNumber * 7 * 24 * 60 * 60 );
    $timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp ) - 1 );
    return date( 'Y-m-d', $timestamp_for_monday );
  }

  public function getWeekOffset($offset = 0)
  {
    if ( $offset == 0) return $this->firstDayOfWeek;

    $newDate = clone $this->firstDayOfWeek;

    if ( $offset > 0 ) {
      $o = $offset * 7;
      $newDate->add(new DateInterval("P{$o}D"));
    }

    if ( $offset < 0 ) {
      $offset = abs($offset);
      $o = $offset * 7;
      $newDate->sub(new DateInterval("P{$o}D"));
    }

    return $newDate;
  }

  public function getWeek()
  {
    $week = [];
    $dt = clone $this->firstDayOfWeek;

    for ( $i = 0; $i < 7; $i++ )
    {
      $week[] = $dt->format('Y-m-d');
      $dt->add(new DateInterval('P1D'));
    }

    return $week;
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

  public function getDiaryTypes()
  {
    $dao = new EventDAO();
    return $dao->getUserEventTypes($this->username);
  }

  public function getDiaryEvents()
  {
    $weekDiary = [];
    $dt = clone $this->firstDayOfWeek;

    for ( $i = 0; $i < 7; $i++ ) {
      $diary = new Diary;
      foreach ($this->getTimetable($dt) as $event) {
        $diary->addEvent($event);
      }

      foreach ($this->getEvents($dt) as $event) {
        $diary->addEvent($event);
      }

      $weekDiary[$dt->format('Y-m-d')] = $diary;
      $dt->add(new DateInterval('P1D'));
    }

    return $weekDiary;
  }

  public function getDiaryAddPath()
  {
    $date = $this->date->format('Y/m/d');
    return BASE_PATH . "$this->username/diary/add/$date";
  }

  public function getDiaryPath($daysOffset = 0)
  {
    if ( $daysOffset == 0) return BASE_PATH . "$this->username/diary/$this->date->format('Y/m/d')";

    $newDate = clone $this->date;

    if ( $daysOffset > 0 ) {
      $newDate->add(new DateInterval("P{$daysOffset}D"));
    }

    if ( $daysOffset < 0 ) {
      $daysOffset = abs($daysOffset);
      $newDate->sub(new DateInterval("P{$daysOffset}D"));
    }

    return BASE_PATH . "$this->username/diary/{$newDate->format('Y/m/d')}";
  }
}