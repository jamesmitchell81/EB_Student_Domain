<?php namespace DAO;

include_once './_database/DatabaseQuery.php';

use DateTime;
use PDO;
use Database\DatabaseQuery;
use Models\Entities\Timetable;

class TimetableDAO
{
  private $db;

  public function selectUserTimetableDate($username, DateTime $date)
  {
    $sql = "SELECT s.Date, l.idLecturer, st.Title, st.FirstName, st.Surname,
                   m.idModuleCode, m.Title, t.StartTime, t.EndTime, r.idRoomNumber
            FROM Timetable t
            INNER JOIN Session s ON s.idTimetable = t.idTimetable
            INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
            INNER JOIN Lecturer l ON l.idLecturer = t.idLecturer
            INNER JOIN Staff st ON st.idStaff = l.idStaff
            INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
            INNER JOIN Room r ON r.idRoomNumber = t.idRoomNumber
            WHERE s.Date = :sessionDate AND ms.idStudent = :username";

    $this->db = new DatabaseQuery();
    $this->db->set('sessionDate', $date->format('Y-m-d'), PDO::PARAM_STR);
    $this->db->set('username', $username, PDO::PARAM_INT);

    $this->db->select($sql);
    $data = $this->db->all();

    var_dump($data);

  }


}