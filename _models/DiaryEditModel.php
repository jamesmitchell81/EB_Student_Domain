<?php

include_once './_util/Redirect.php';
include '_entities/Event.php';
include './_dao/EventDAO.php';

class DiaryEditModel
{
  private $arguments = [];
  private $year;
  private $month;
  private $day;
  private $hours;
  private $minutes;
  private $seconds = 0;
  private $action;

  public function __construct($args = [], $action = '')
  {
    var_dump($args);

    $this->year = isset($args[':yyyy']) ? $args[':yyyy'] : date('Y');
    $this->month = isset($args[':mm']) ? $args[':mm']   : date('m');
    $this->day  = isset($args[':dd']) ? $args[':dd']   : date('d');
    $this->hours = isset($args[':time']) ? split(':', $args[':time'])[0] : date('H');
    $this->minutes = isset($args[':time']) ? split(':', $args[':time'])[1] : date('i');

    $this->action = $action;
  }

  public function getAction()
  {
    return $this->action;
  }

  public function getEvent()
  {
    $event = new Event();
    $date = new DateTime();
    $date->setDate($this->year, $this->month, $this->day);
    $date->setTime($this->hours, $this->minutes, 0);

    $event->setStartDateTime(strtotime($date->format('d/m/Y H:i')));
    $date->add(new DateInterval('PT1H'));
    $event->setEndDateTime(strtotime($date->format('d/m/Y H:i')));

    return $event;
  }

}