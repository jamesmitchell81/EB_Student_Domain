<?php

include_once './_util/Redirect.php';
include '_entities/Event.php';
include './_dao/EventDAO.php';

class DiaryAddModel
{
  private $arguments = [];
  private $action;
  private $username;

  public function __construct($args = [], $action = '')
  {
    $this->arguments = $args;
    $this->action = $action;
    $this->username = Input::session('username');
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

    $event->setTitle(trim($data['title']));
    $event->setDescription(trim($data['details']));

    $startDateTime = "{$data['start-date']} {$data['start-time']}";
    $endDateTime = "{$data['finish-date']} {$data['finish-time']}";
    $startDateTime = strtotime($startDateTime);
    $endDateTime = strtotime($endDateTime);

    $event->setDateTime($startDateTime, $endDateTime);

    $dao->createNewEvent($event, $this->username);
    $back = "diary/" . date('Y/m/d', $startDateTime);
    Redirect::to($back);
  }

  public function edit()
  {
    var_dump(Input::post());
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