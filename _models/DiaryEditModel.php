<?php

include '_entities/Event.php';
include './_dao/EventDAO.php';

use Util\Input;
use Models\Entities\Event;
use DAO\EventDAO;

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
    return $this->arguments[0];
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

  public function updateEvent($args = [])
  {

  }

  public function deleteEvent($args = [])
  {

  }

}