<?php

include '_entities/Notification.php';
include '_entities/Person.php';
include './_dao/NotificationDAO.php';
include './_util/Redirect.php';

use Util\Input;
use Util\Redirect;
use Models\Entities\Notification;
use Models\Entities\Person;
use DAO\NotificationDAO;

class NotificationsModel
{
  private $username;
  private $notifications;
  private $args = [];
  private $action;

  public function __construct($args = [], $action = '')
  {
    $this->args = $args;
    $this->action = $action;
    $this->username = Input::session('username');
  }

  public function getAction()
  {
    return $this->action;
  }

  public function getNotifications()
  {
    $dao = new NotificationDAO();

    if ( empty($this->args) )
    {
      return $dao->getUserNotifications($this->username);
    } else {
      $id = array_shift($this->args);
      return $dao->getNotificationById($id, $this->username);
    }
  }

  public function save()
  {

  }

  public function delete()
  {
    if ( !empty($this->args) )
    {
      $id = array_shift($this->args);
      $dao = new NotificationDAO();
      $dao->deleteNotificationById($id, $this->username);
      Redirect::to('modules');
      // header("Location: {$newPath}");
      // exit();
      // redirect.
    }
  }
}