<?php

class TimetableSession {
  private $_room, $_lecturer, $_module, $_start_time, $_duration, $_weekday;

  public function __construct($room, $lecturer, $module, $start_time, $duration, $weekday)
  {
    $this->_room = $room;
    $this->_lecturer = $lecturer;
    $this->_module = $module;
    $this->_start_time = $start_time;
    $this->_duration = $duration;
    $this->_weekday = $weekday;
  }

  public function getWeekday()
  {
    return $this->_weekday;
  }
}

?>