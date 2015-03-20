<?php

include '_entities/Notification.php';
include '_entities/Person.php';
include './_dao/NotificationDAO.php';

use Util\Input;
use Models\Entities\Notification;
use Models\Entities\Person;
use DAO\NotificationDAO;

class NotificationsModel
{
  private $username;
  private $notifications;
  private $args = [];

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
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


}