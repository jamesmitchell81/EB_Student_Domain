<?php

include './_database/DatabaseQuery.php';
include './_dao/AttendanceDAO.php';
include_once './_models/_entities/AttendanceSummary.php';

use Util\Input;
use Database\DatabaseQuery;
use Models\Entities\AttendanceSummary;
use DAO\ModuleDAO;
use DAO\AttendanceDAO;

class AttendanceModel
{
  private $username;
  private $period;
  private $moduleCode;

  public function __construct($args = [])
  {
    $this->username = Input::session('username');

    if ( array_key_exists(":code", $args) )
      $this->moduleCode = $args[':code'];

    if ( array_key_exists(":period", $args) )
      $this->period = $args[":period"];
  }

  public function getAttendanceSummary()
  {
    $dao = new AttendanceDAO();
    return $dao->getAttendanceSummary($this->username);
  }

  public function getSummaryTotals()
  {
    $dao = new AttendanceDAO();
    return $dao->getAttendanceSummaryTotals($this->username);
  }

  public function getAttendanceModules()
  {
    $moduleDAO = new ModuleDAO();
    return $moduleDAO->getUserModules($this->username);
  }

  public function getAttendanceWeeks()
  {
    $years = explode("-", $this->period);

    $db = new DatabaseQuery();
    $db->setInt(':start', $years[0]);
    $db->setInt(':end', $years[1]);
    $db->setInt(':username', $this->username);
    $db->select('SELECT DISTINCT DATE_SUB(s.Date, INTERVAL (DAYOFWEEK(s.Date) - 2) DAY) AS WeekStart,
                                 DATE_ADD(s.Date, INTERVAL ((DAYOFWEEK(s.Date) - 2) + 5) DAY) WeekEnd
                 FROM Session s
                 INNER JOIN Attendance a ON a.idSession = s.idSession
                 INNER JOIN Student st ON st.idStudent = a.idStudent
                 INNER JOIN ModuleStudents ms ON ms.idStudent = st.idStudent
                 INNER JOIN Module m ON m.idModuleCode = ms.idModuleCode
                 INNER JOIN CourseAcademicYear c ON c.idCourseCode = m.idCourseCode
                 WHERE YEAR(c.DateStart) = :start
                 AND YEAR(c.DateEnd) = :end
                 AND st.idStudent = :username');

    $data = $db->all();
    return $data;
  }

  public function getSessionDays()
  {
    $years = explode("-", $this->period);
    $db = new DatabaseQuery();
    $db->setInt(':start', $years[0]);
    $db->setInt(':end', $years[1]);
    $db->setInt(':username', $this->username);
    $db->select('SELECT DISTINCT s.Date
                 FROM Session s
                 INNER JOIN Attendance a ON a.idSession = s.idSession
                 INNER JOIN Student st ON st.idStudent = a.idStudent
                 INNER JOIN ModuleStudents ms ON ms.idStudent = st.idStudent
                 INNER JOIN Module m ON m.idModuleCode = ms.idModuleCode
                 INNER JOIN CourseAcademicYear c ON c.idCourseCode = m.idCourseCode
                 WHERE YEAR(c.DateStart) = :start
                 AND YEAR(c.DateEnd) = :end
                 AND st.idStudent = :username ORDER BY s.Date DESC');

    $data = $db->all();
    return $data;
  }

  public function getTermDates()
  {
    // temp
    $start = new DateTime(2014, 5, 1);
    $end = new Datetime(2015, 5, 1);

  }

  public function getAttendanceHistory()
  {
    $attendance = [];
    $attendanceDAO = new AttendanceDAO();
    $modules = $this->getAttendanceModules();

    // get term dates.
    $start = '2014-05-01';
    $end = '2015-05-01';

    foreach ($modules as $module)
    {
      $code = $module->getModuleCode();
      $attendance[$code] = $attendanceDAO->selectModuleAttendanceRecords($this->username, $code, $start, $end);
    }
    return $attendance;
  }

}