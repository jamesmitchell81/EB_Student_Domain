<?php

class Timetable
{
  private $sessions = [];

  public function addSession(Session $session)
  {
    $weekday = $session->getWeekday();
    $start = date('H:i', strtotime($session->getStartTime()));

    $this->sessions[$weekday][$start] = $session;
  }

  public function getSessions()
  {
    return $this->sessions;
  }

  public function getSession($weekday, $timestart)
  {
    return $this->sessions[$weekday][$timestart];
  }

  public function hasSession($weekday, $timestart)
  {
    if ( array_key_exists($weekday, $this->sessions))
    {
      if ( array_key_exists($timestart, $this->sessions[$weekday]))
      {
        return true;
      }
    }
    return false;
  }
}