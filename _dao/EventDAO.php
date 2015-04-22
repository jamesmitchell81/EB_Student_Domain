<?php

include_once './_models/_entities/Event.php';
include_once './_models/_entities/Person.php';
include_once './_models/_entities/PersonInterface.php';
include_once './_database/DatabaseQuery.php';

class EventDAO
{
  private $db;

  public function getEventByID($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select("SELECT * FROM Events WHERE idEvents = :id");
    $data = $this->db->first();

    $event = new Event();
    $event->setId($data['idEvents']);
    $event->setTitle($data['Title']);
    $event->setDescription($data['Description']);
    $event->setDateTime($data['StartDateTime'], $data['EndDateTime']);

    return $event;
  }

  public function getUserEventsByDay($username, $date)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->setStr('date', $date);

    $this->db->select('SELECT e.idEvents, e.Title, e.Description, e.StartDateTime, e.EndDateTime, e.Type
                       FROM Events e
                       INNER JOIN StudentDiary s ON s.idEvents = e.idEvents
                       WHERE s.idStudent = :username AND date(e.StartDateTime) = :date');

    $data = $this->db->all();

    $events = [];

    foreach ($data as $index => $event) {

      extract($event);

      $events[$index] = new Event();
      $events[$index]->setId($idEvents);
      $events[$index]->setDiaryName($Type);
      $events[$index]->setTitle($Title);
      $events[$index]->setDescription($Description);
      $events[$index]->setStartDateTime($StartDateTime);
      $events[$index]->setEndDateTime($EndDateTime);

    }
    return $events;
  }

  public function getUserEventTypes($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT DISTINCT e.Type FROM Events e
                       INNER JOIN StudentDiary s ON s.idEvents = e.idEvents
                       WHERE s.idStudent = :username');
    return $this->db->all();
  }

  public function createNewEvent(Event $event, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setStr('title', $event->getTitle());
    $this->db->setStr('description', $event->getDescription());
    $this->db->setStr('start', date('Y-m-d H:i:s', $event->getStartDateTime()));
    $this->db->setStr('end', date('Y-m-d H:i:s', $event->getEndDateTime()));

    $sql = 'INSERT INTO Events (Title, Description, StartDateTime, EndDateTime)
            VALUES (:title, :description, :start, :end)';
    $this->db->insert($sql);

    $id = $this->db->getLastID();
    $this->db = new DatabaseQuery();
    $this->db->setInt('eventid', $id);
    $this->db->setInt('username', $username);
    $this->db->insert('INSERT INTO StudentDiary(idStudent, idEvents) VALUES (:username, :eventid)');

    return $id;
  }

  public function updateEvent(Event $event)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $event->getId());
    $this->db->setStr('title', $event->getTitle());
    $this->db->setStr('description', $event->getDescription());
    $this->db->setStr('start', date('Y-m-d H:i:s', $event->getStartDateTime()));
    $this->db->setStr('end', date('Y-m-d H:i:s', $event->getEndDateTime()));

    $sql = 'UPDATE Events SET Title = :title, Description = :description,
                   StartDateTime = :start, EndDateTime = :end
            WHERE idEvents = :id';

    $this->db->update($sql);
  }

  public function deleteUserEvent(Event $event, $username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $event->getId());
    // count event users
    $this->db->select('SELECT COUNT(idStudent) FROM StudentDiary WHERE idEvents = :id');

    $count = $this->db->first();

    // where student is only subjset of event.
    if ( !($count > 1) )
    {
      $sql = 'DELETE FROM Events WHERE idEvents = :id';
      $this->db->delete($sql);
    }

    $this->db->setInt('username', $username);
    $this->db->delete('DELETE FROM StudentDiary WHERE idEvents = :id AND idStudent = :username');
  }

}