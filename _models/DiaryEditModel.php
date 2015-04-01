<?php

include_once './_util/Redirect.php';
include '_entities/Event.php';
include './_dao/EventDAO.php';

class DiaryEditModel
{
  private $arguments = [];
  private $action;

  public function __construct($args = [], $action = '')
  {
    $this->arguments = $args;
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
    $date->setDate($this->arguments[':yyyy'], $this->arguments[':mm'], $this->arguments[':dd']);

    $event->setStartDateTime(strtotime($date->format('d/m/Y H:i')));
    $date->add(new DateInterval('PT1H'));
    $event->setEndDateTime(strtotime($date->format('d/m/Y H:i')));

    return $event;
  }

}