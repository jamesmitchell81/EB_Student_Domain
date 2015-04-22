<?php

include_once './_util/Redirect.php';
include '_entities/Event.php';
include './_dao/EventDAO.php';

class DiaryEditModel
{
  private $args = [];
  private $year;
  private $month;
  private $day;
  private $hours;
  private $minutes;
  private $seconds = 0;
  private $action;

  public function __construct($args = [], $action = '')
  {
    $this->args = $args;

    $this->year = isset($this->args[':yyyy']) ? $this->args[':yyyy'] : date('Y');
    $this->month = isset($this->args[':mm']) ? $this->args[':mm']    : date('m');
    $this->day  = isset($this->args[':dd']) ? $this->args[':dd']     : date('d');
    $this->hours = isset($this->args[':time']) ? explode(':', $this->args[':time'])[0] : date('H');
    $this->minutes = isset($this->args[':time']) ? explode(':', $this->args[':time'])[1] : date('i');

    $this->action = $action;
  }

  public function getAction()
  {
    return $this->action;
  }

  public function getEvent()
  {
    $event = new Event();

    if ( isset($this->args[':id']) )
    {
      $dao = new EventDAO();
      $id = $this->args[':id'];
      return $dao->getEventById($id);
    }

    $date = new DateTime();
    $date->setDate($this->year, $this->month, $this->day);
    $date->setTime($this->hours, $this->minutes, 0);
    $event->setStartDateTime($date->format('Y/m/d H:i'));
    $date->add(new DateInterval('PT1H'));
    $event->setEndDateTime($date->format('Y/m/d H:i'));

    return $event;
  }

}