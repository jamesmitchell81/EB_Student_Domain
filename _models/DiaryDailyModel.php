<?php

include '_entities/Diary.php';
include './_dao/TimetableDAO.php';
include './_dao/EventDAO.php';
include_once './_util/Time.php';

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

  public function getUsername()
  {
    return $this->username;
  }

  public function getDate($daysOffset = 0)
  {
    if ( $daysOffset == 0) return $this->date;

    $newDate = clone $this->date;

    if ( $daysOffset > 0 ) {
      $newDate->add(new DateInterval("P{$daysOffset}D"));
    }

    if ( $daysOffset < 0 ) {
      $daysOffset = abs($daysOffset);
      $newDate->sub(new DateInterval("P{$daysOffset}D"));
    }

    return $newDate;
  }

  /**
   * Allow the inclusion
   * of timetable events in diary.
   */
  private function getTimetable()
  {
    $dao = new TimetableDAO();
    return $dao->selectUserTimetableEvent($this->username, $this->date->format('Y-m-d'));
  }

  private function getEvents()
  {
    $dao = new EventDAO();
    return $dao->getUserEventsByDay($this->username, $this->date->format('Y-m-d'));
  }

  /**
   * implementation incomplete.
   * allows for differenation
   * between timetables events and diary events.
   */
  public function getDiaryTypes()
  {
    $dao = new EventDAO();
    return $dao->getUserEventTypes($this->username);
  }

  public function getDiaryEvents()
  {
    $this->diary = new Diary;

    foreach ($this->getTimetable() as $event) {
      $this->diary->addEvent($event);
    }

    foreach ($this->getEvents() as $event) {
      $this->diary->addEvent($event);
    }

    return $this->diary;
  }

  /**
   * Create the url to allow the
   * addition of Diary Events by user.
   * Should be a 'View' responsibility.
   */
  public function getDiaryAddPath()
  {
    $date = $this->date->format('Y/m/d');
    return BASE_PATH . "$this->username/diary/add/$date";
  }

  public function getDiaryPath($daysOffset = 0)
  {
    $newDate = $this->getDate($daysOffset);
    return BASE_PATH . "$this->username/diary/{$newDate->format('Y/m/d')}";
  }
}