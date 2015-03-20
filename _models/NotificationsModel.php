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
  private $username = '20150001';
  private $notifications;
  private $args = [];

  public function __construct($args = [])
  {
    $this->args = $args;
  }

  public function getNotifications()
  {
    $dao = new NotificationDAO();
    if ( empty($args) )
    {
      return $dao->getUserNotifications($this->username);
    } else {
      $id = array_shift($args);
      return $dao->getNotificationById();
    }
  }


}