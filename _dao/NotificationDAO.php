<?php namespace DAO;

include_once './_models/_entities/Notification.php';
include_once './_models/_entities/Person.php';
include_once './_models/_entities/PersonInterface.php';
include_once './_database/DatabaseQuery.php';

use PDO;
use Models\Entities\Notification;
use Models\Entities\Person;
use Database\DatabaseQuery;

class NotificationDAO
{
  private $db;

  public function getNotificationById($id, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('id', $id, PDO::PARAM_INT);
    $this->db->set('username', $username, PDO::PARAM_INT);
    $this->db->select('SELECT n.Title AS Subject, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
                       FROM Notifications n
                       INNER JOIN Staff s ON s.idStaff = n.idStaff
                       INNER JOIN NotificationReceivers r ON r.idNotifications = n.idNotifications
                       WHERE r.idStudent = :username AND n.idNotifications = :id
                       ORDER BY n.NotificationDate DESC');
    $data = $this->db->first();

    $notification = [];
    extract($data);

    $sender = new Person();
    $sender->setTitle($Title);
    $sender->setFirstName($FirstName);
    $sender->setLastName($Surname);

    $notifications[] = new Notification();
    $notifications[0]->setSubject($Subject);
    $notifications[0]->setBody($Body);
    $notifications[0]->setSentDateTime($NotificationDate);
    $notifications[0]->setSender($sender);

    return $notifications;
  }

  public function getUserNotifications($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('username', $username, PDO::PARAM_INT);
    $this->db->select('SELECT n.Title AS Subject, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
                       FROM Notifications n
                       INNER JOIN Staff s ON s.idStaff = n.idStaff
                       INNER JOIN NotificationReceivers r ON r.idNotifications = n.idNotifications
                       WHERE r.idStudent = :username ORDER BY n.NotificationDate DESC');
    $data = $this->db->all();

    $notifications = [];

    foreach ($data as $index => $notice)
    {
      extract($notice);

      $sender = new Person();
      $sender->setTitle($Title);
      $sender->setFirstName($FirstName);
      $sender->setLastName($Surname);

      $notifications[] = new Notification();
      $notifications[$index]->setSubject($Subject);
      $notifications[$index]->setBody($Body);
      $notifications[$index]->setSentDateTime($NotificationDate);
      $notifications[$index]->setSender($sender);
    }

    return $notifications;
  }


}