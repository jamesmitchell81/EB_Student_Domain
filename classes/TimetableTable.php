<?php


class TimetableTable {
  private $table, $table_start, $table_finish;
  private $sessions = [];

  public function __construct($start, $finish)
  {
    $this->table_start = $start;
    $this->table_finish = $finish;
  }

  public function addSession(TimetableSession $timetable_session)
  {
    $this->sessions[] = $timetable_session;
  }

  public function getSessionByIndex($index)
  {
    return $this->sessions[$index];
  }

  public function getSessionsByDay($day)
  {
    $sessions_by_day = [];

    foreach ($this->sessions as $session)
    {
      if ( $session->getWeekday() === $day )
      {
        $sessions_by_day[] = $session;
      }
    }
    return $sessions_by_day;
  }

  public function draw()
  {

  }
}

?>