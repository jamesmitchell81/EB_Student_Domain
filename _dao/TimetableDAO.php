<?php

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/Event.php';
include_once './_models/_entities/Session.php';
include_once './_models/_entities/Room.php';
include_once './_models/_entities/Timetable.php';
include_once './_models/_entities/Lecturer.php';

class TimetableDAO
{
  private $db;

  private function selectUserSessions($username, $date)
  {
    $sql = "SELECT s.Date, l.idLecturer, st.Title, st.FirstName, st.Surname,
                   m.idModuleCode, m.Title AS ModuleName,
                   t.StartTime,
                   t.EndTime,
                   r.idRoomNumber, r.Capacity, t.Weekday
            FROM Timetable t
            INNER JOIN Session s ON s.idTimetable = t.idTimetable
            INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
            INNER JOIN Lecturer l ON l.idLecturer = t.idLecturer
            INNER JOIN Staff st ON st.idStaff = l.idStaff
            INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
            INNER JOIN Room r ON r.idRoomNumber = t.idRoomNumber
            WHERE s.Date = :sessionDate AND ms.idStudent = :username";

    $this->db = new DatabaseQuery();
    $this->db->set('sessionDate', $date, PDO::PARAM_STR);
    $this->db->set('username', $username, PDO::PARAM_INT);

    $this->db->select($sql);
    return $this->db->all();
  }

  private function selectUserSessionsWeek($username, $start, $end)
  {
    $sql = "SELECT s.Date, l.idLecturer, st.Title, st.FirstName, st.Surname,
                   m.idModuleCode, m.Title AS ModuleName,
                   t.StartTime,
                   t.EndTime,
                   r.idRoomNumber, r.Capacity, t.Weekday
            FROM Timetable t
            INNER JOIN Session s ON s.idTimetable = t.idTimetable
            INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
            INNER JOIN Lecturer l ON l.idLecturer = t.idLecturer
            INNER JOIN Staff st ON st.idStaff = l.idStaff
            INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
            INNER JOIN Room r ON r.idRoomNumber = t.idRoomNumber
            WHERE s.Date BETWEEN :start AND :end  AND ms.idStudent = :username";

    $this->db = new DatabaseQuery();
    $this->db->set('start', $start, PDO::PARAM_STR);
    $this->db->set('start', $end, PDO::PARAM_STR);
    $this->db->set('username', $username, PDO::PARAM_INT);

    $this->db->select($sql);
    return $this->db->all();
  }



  public function selectUserTimetableEvent($username, $date)
  {
    $data = $this->selectUserSessions($username, $data);

    $events = [];

    foreach ($data as $index => $timetable) {

      extract($timetable);

      $lecturer = new Lecturer();
      $lecturer->setFullName($Title, $FirstName, $Surname);
      $lecturer->setID($idLecturer);

      $events[] = new Event();
      $events[$index]->addAttendee($lecturer);
      $events[$index]->setLocation($idRoomNumber);
      $events[$index]->setTitle("{$idModuleCode} {$ModuleName}");
      $events[$index]->setDiaryName("Timetable");
      $events[$index]->setStartDateTime($StartDateTime);
      $events[$index]->setEndDateTime($EndDateTime);
    }

    return $events;
  }


  public function selectUserTimetableDate($username, $date)
  {

    $data = $this->selectUserSessionsWeek($username, $date);

    foreach ($data as $index => $timetable) {

      extract($timetable);

      $lecturer = new Lecturer();
      $lecturer->setFullName($Title, $FirstName, $Surname);
      $lecturer->setID($idLecturer);

      $room = new Room();
      $room->setRoomReference($idRoomNumber);
      $room->setCapacity($Capacity);

      $session = new Session();
      $session->setLecturer($lecturer);
      $session->setRoom($room);
      $session->setTitle("{$idModuleCode} {$ModuleName}");
      $session->setStartTime($StartTime);
      $session->setEndTime($EndTime);
      $session->setWeekday($Weekday);

      $timetable = new Timetable();
      $timetable->addSession($session);
    }

    return $timetable;
  }


}