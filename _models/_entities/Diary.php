<?php

class Diary
{
  private $events;
  private $dateFormat = 'Y-m-d';
  private $timeFormat = 'H:i';

  public function addEvent(Event $event)
  {
    $date = $event->getDate($this->dateFormat);
    $time = $event->getStartTime($this->timeFormat);

    $this->events[$date][] = $event;
  }

  public function getEvents()
  {
    return $this->events;
  }

  public function getEventsAt($dateString, $timeString)
  {
    $eventsAtTimespace = [];

    foreach ($this->events[$dateString] as $index => $event)
    {
      if ( $event->getStartTime('H') == date('H', strtotime($timeString)) )
      {
        $eventsAtTimespace[] = $event;
      }
    }

    return $eventsAtTimespace;
  }

  public function hasEvent($dateString, $timeString = '')
  {
    if ( !isset($this->events) ) return false;
    if ( !array_key_exists($dateString, $this->events) )
    {
      return false;
    }

    if ( $timeString != '' )
    {
      return $this->hasStartTime($dateString, $timeString);
    }
    return false;
  }

  public function getEventsCount($dateString)
  {
    if ( !isset($this->events) ) return 0;
    if ( !array_key_exists($dateString, $this->events) ) return 0;

    return count($this->events[$dateString]);
  }

  private function hasStartTime($dateString, $timeString)
  {
      foreach ($this->events[$dateString] as $event)
      {
        if ( $event->getStartTime('H') == date('H', strtotime($timeString)) )
        {
          return true;
        }
      }
      return false;
  }

}