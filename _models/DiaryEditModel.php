<?php

include '_entities/Event.php';
include './_dao/EventDAO.php';

use Util\Input;
use Models\Entities\Event;

class DiaryEditModel
{
  private $arguments = [];

  public function __construct($args = [])
  {
    $this->arguments = $args;
    var_dump($this->arguments);
  }

  public function getAction()
  {
    // temp.
    return $this->arguments[0];
    // return $this0->arguments['action']
  }

  public function add($args = [])
  {
    $data = Input::post();

    $dao = new EventDAO();
    $event = new Event();

    $event->setTitle($data['title']);
    $event->setDescription($data['details']);
    $event->setDateTime($data['start'], $data['finish']);

    $dao->createNewEvent($event);
  }

  public function updateEvent($args = [])
  {

  }

  public function deleteEvent($args = [])
  {

  }

}