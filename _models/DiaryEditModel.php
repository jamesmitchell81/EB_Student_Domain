<?php

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

  public function add($args = [])
  {
    $data = Input::post();

    if ( empty($data) ) return;

    $dao = new EventDAO();
    $event = new Event();

    $event->setTitle($data['title']);
    $event->setDescription($data['details']);
    $event->setDateTime($data['start'], $data['finish']);

    $dao->createNewEvent($event);
  }

  public function edit()
  {

  }

  public function delete()
  {

  }

  public function updateEvent($args = [])
  {

  }

  public function deleteEvent($args = [])
  {

  }

}