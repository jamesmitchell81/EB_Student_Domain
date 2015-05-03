<?php

include '_entities/Notification.php';
include '_entities/Person.php';
include './_dao/NotificationDAO.php';
include './_util/Redirect.php';

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
    if ( !empty($this->args) )
    {
      $id = array_shift($this->args);
      $dao = new NotificationDAO();
      $dao->saveNotification($id, $this->username);
      Redirect::to('notifications');
    }
  }

  public function delete()
  {
    if ( !empty($this->args) )
    {
      $id = array_shift($this->args);
      $dao = new NotificationDAO();
      $dao->deleteNotificationById($id, $this->username);

      if ( Input::server('HTTP_X_REQUESTED_WITH') != 'XMLHttpRequest' )
      {
        Redirect::to('notifications');
      } else {
        echo $id;
      }
    }
  }
}