<?php

include_once './_models/_entities/Notification.php';
include_once './_models/_entities/Person.php';
include_once './_models/_entities/PersonInterface.php';
include_once './_database/DatabaseQuery.php';

class NotificationDAO
{
  private $db;

  public function getNotificationById($id, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('id', $id, PDO::PARAM_INT);
    $this->db->set('username', $username, PDO::PARAM_INT);
    $this->db->select('SELECT n.idNotifications, n.Title AS Subject, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
                       FROM Notifications n
                       INNER JOIN Staff s ON s.idStaff = n.idStaff
                       INNER JOIN NotificationReceivers r ON r.idNotifications = n.idNotifications
                       WHERE r.idStudent = :username AND n.idNotifications = :id
                       ORDER BY n.NotificationDate DESC');
    $data = $this->db->first();

    $notifications = [];

    if ( $data ) {
      extract($data);

      $sender = new Person();
      $sender->setTitle($Title);
      $sender->setFirstName($FirstName);
      $sender->setLastName($Surname);

      $notifications[] = new Notification();
      $notifications[0]->setID($idNotifications);
      $notifications[0]->setSubject($Subject);
      $notifications[0]->setBody($Body);
      $notifications[0]->setSentDateTime($NotificationDate);
      $notifications[0]->setSender($sender);
    }

    return $notifications;
  }

  public function getUserNotifications($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('username', $username, PDO::PARAM_INT);
    $this->db->select('SELECT n.idNotifications, n.Title AS Subject, n.Body, n.NotificationDate, s.Title, s.FirstName, s.Surname
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
      $notifications[$index]->setID($idNotifications);
      $notifications[$index]->setSubject($Subject);
      $notifications[$index]->setBody($Body);
      $notifications[$index]->setSentDateTime($NotificationDate);
      $notifications[$index]->setSender($sender);
    }

    return $notifications;
  }

  public function saveNotification($id, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->setInt('username', $username);
    $success = $this->db->update('UPDATE NotificationReceivers
                                 SET Saved = TRUE
                                 WHERE idNotifications = :id
                                 AND idStudent = :username');
    return $success;
  }

  public function unSaveNotification($id, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->setInt('username', $username);
    $success = $this->db->update('UPDATE NotificationReceivers
                                 SET Saved = FALSE
                                 WHERE idNotifications = :id
                                 AND idStudent = :username');
    return $success;
  }

  public function deleteNotificationById($id, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->setInt('username', $username);
    $success = $this->db->delete('DELETE FROM NotificationReceivers
                                  WHERE idStudent = :username
                                  AND idNotifications = :id');
    return $success;
  }
}