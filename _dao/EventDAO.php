<?php namespace DAO;

include_once './_models/_entities/Event.php';
include_once './_models/_entities/Person.php';
include_once './_models/_entities/PersonInterface.php';
include_once './_database/DatabaseQuery.php';

use PDO;
use Models\Entities\Event;
use Models\Entities\Person;
use Database\DatabaseQuery;

class EventDAO
{
  private $db;

  public function getEventByID($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('id', $id, PDO::PARAM_INT);
    $this->db->select("SELECT * FROM Events WHERE idEvents = {:id}");
    $data = $this->db->first();

    $event = new Event();
    $event->setTitle($data['Title']);
    $event->setDescription($data['Description']);
    $event->setDateTime($data['StartDateTime'], $data['EndDateTime']);

    // get attendees...staff
    // 'SELECT idStaff FROM StaffDiary WHERE idEvents = {:id}'

    // get attendees...student
    // 'SELECT idStudent FROM StudentDiary WHERE idEvents = {:id}'

    return $event;
  }

  public function createNewEvent(Event $event)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('title', $event->getTitle());
    $this->db->set('description', $event->getDescription());
    $this->db->set('start', $event->getStartDateTime());
    $this->db->set('end', $event->getEndDateTime());

    $sql = 'INSERT INTO Events (Title, Description, StartDateTime, EndDateTime)
            VALUES (:title, :description, :start, :end)';

    // do insert.
    $this->db->insert($sql);

    // for each attendee.
      // insert.

  }

}