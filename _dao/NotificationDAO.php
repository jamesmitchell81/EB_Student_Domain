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

  public function getNotificationById($id)
  {

  }

  public function getUserNotifications($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('username', $username, PDO::PARAM_INT);
    $this->db->select('SELECT n.Title AS Subject, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
                       FROM Notifications n
                       INNER JOIN Staff s ON s.idStaff = n.idStaff
                       INNER JOIN NotificationReceivers r ON r.idNotifications = n.idNotifications
                       WHERE r.idStudent = :username');
    $data = $this->db->all();

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