<?php

include_once './_models/_entities/Attendance.php';
include_once './_models/_entities/AttendanceSession.php';
include_once './_models/_entities/AttendanceSummary.php';
include_once './_dao/ModuleDAO.php';
include_once './_dao/StudentDAO.php';
include_once './_database/DatabaseQuery.php';

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
                       GROUP BY st.idStudent, m.idModuleCode');
    $data = $this->db->all();

    $moduleDAO = new ModuleDAO();
    $attendanceSummary = [];

    foreach ($data as $index => $summary) {

      extract($summary);
      $module = $moduleDAO->getModuleById($idModuleCode);

      $attendanceSummary[] = new AttendanceSummary();
      $attendanceSummary[$index]->setModule($module);
      $attendanceSummary[$index]->setResult('Absent', $Absent);
      $attendanceSummary[$index]->setResult('Present', $Present);
      $attendanceSummary[$index]->setResult('Authorised', $Authorised);
      $attendanceSummary[$index]->setTotal($Total);
    }

    return $attendanceSummary;
  }

  public function getAttendanceSummaryTotals($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT st.idStudent,
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
                       GROUP BY st.idStudent');
    $data = $this->db->first();

    $attendanceSummary = new AttendanceSummary();

    if ( empty($data) ) return $attendanceSummary;

    $attendanceSummary->setResult('Absent', $data['Absent']);
    $attendanceSummary->setResult('Present', $data['Present']);
    $attendanceSummary->setResult('Authorised', $data['Authorised']);
    $attendanceSummary->setTotal($data['Total']);

    return $attendanceSummary;
  }

  public function selectModuleAttendanceRecords($username, $code, $start, $end)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->setStr('code', $code);
    $this->db->setStr('start', $start);
    $this->db->setStr('end', $end);
    $this->db->select('SELECT s.Date, a.Result
                       FROM Attendance a
                       INNER JOIN Session s ON s.idSession = a.idSession
                       INNER JOIN Timetable t ON t.idTimetable = s.idTimetable
                       INNER JOIN Module m ON m.idModuleCode = t.idModuleCode
                       INNER JOIN Student st ON st.idStudent = a.idStudent
                       WHERE m.idModuleCode = :code AND st.idStudent = :username
                       AND s.Date BETWEEN :start AND :end
                       ORDER BY s.Date DESC');
    $data = $this->db->all();

    $attendance = new Attendance();
    $attendance->setStudent($username);
    $attendance->setModule($code);

    foreach ($data as $session) {
      $attendanceSession = new AttendanceSession();
      // $attendanceSession->setDate($session['Date']);
      // $attendanceSession->setResult($session['Result']);
      // $attendance->addSession($attendanceSession);
      $attendance->addSession($session['Date'], $session['Result']);
    }

    return $attendance;
  }
}