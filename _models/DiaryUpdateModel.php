<?php

include_once './_util/Redirect.php';
include '_entities/Event.php';
include './_dao/EventDAO.php';

class DiaryUpdateModel
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

    $startDateTime = new DateTime();
    $dateParts = explode("/", $data['start-date']);
    $timeParts = explode(":", $data['start-time']);
    $startDateTime->setDate($dateParts[2], $dateParts[1], $dateParts[0]);
    $startDateTime->setTime($timeParts[0], $timeParts[1]);

    $endDateTime = new DateTime();
    $dateParts = explode("/", $data['finish-date']);
    $timeParts = explode(":", $data['finish-time']);
    $endDateTime->setDate($dateParts[2], $dateParts[1], $dateParts[0]);
    $endDateTime->setTime($timeParts[0], $timeParts[1]);

    $event->setDateTime($startDateTime->format('Y/m/d H:i'), $endDateTime->format('Y/m/d H:i'));
    $id = $dao->createNewEvent($event, $this->username);

    if ( Input::server('HTTP_X_REQUESTED_WITH') != 'XMLHttpRequest' )
    {
      $back = "diary/" . $startDateTime->format('Y/m/d');
      Redirect::to($back);
    } else {
      echo BASE_PATH . Input::session('username') . "/diary/edit/" . $id;
    }
  }

  public function edit()
  {
    $data = Input::post();

    if ( empty($data) ) return;

    $dao = new EventDAO();
    $event = new Event();

    $event->setId($data['id']);
    $event->setTitle(trim($data['title']));
    $event->setDescription(trim($data['details']));

    $startDateTime = new DateTime();
    $dateParts = explode("/", $data['start-date']);
    $timeParts = explode(":", $data['start-time']);
    $startDateTime->setDate($dateParts[2], $dateParts[1], $dateParts[0]);
    $startDateTime->setTime($timeParts[0], $timeParts[1]);

    $endDateTime = new DateTime();
    $dateParts = explode("/", $data['finish-date']);
    $timeParts = explode(":", $data['finish-time']);
    $endDateTime->setDate($dateParts[2], $dateParts[1], $dateParts[0]);
    $endDateTime->setTime($timeParts[0], $timeParts[1]);

    if ( $data['action'] == 'delete' ) {
      $dao->deleteUserEvent($event, $this->username);
    } else {
      $dao->updateEvent($event);
    }

    if ( Input::server('HTTP_X_REQUESTED_WITH') != 'XMLHttpRequest' )
    {
      $back = "diary/" . $startDateTime->format('Y/m/d');
      Redirect::to($back);
    }
  }
}