<?php namespace DAO;

include_once './_database/DatabaseQuery.php';

use PDO;
use Database\DatabaseQuery;
// use Models\Entities\Event;

class AttendanceDAO
{
  private $db;

  public function getAttendanceSummary($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT st.idStudent, m.idModuleCode, m.Title,
                          SUM(IF(a.Result = "Absent", 1, 0)) AS Absent,
                          SUM(IF(a.Result = "Present", 1, 0)) AS Present,
                          SUM(IF(a.Result = "Authorised", 1, 0)) AS Authorised,
                          COUNT(a.idAttendance) AS Total
                       FROM Attendance a
                       INNER JOIN Student st ON st.idStudent = a.idStudent
                       INNER JOIN Session s ON s.idSession = a.idSession
                       INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
                       INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
                       WHERE a.idStudent = :username
                       GROUP BY st.idStudent, m.idModuleCode;');
    $data = $this->db->all();

    var_dump($data);

  }


}