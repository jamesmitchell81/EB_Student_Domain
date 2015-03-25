<?php

include './_dao/AttendanceDAO.php';
include_once './_models/_entities/AttendanceSummary.php';

use Util\Input;
use Models\Entities\AttendanceSummary;
use DAO\ModuleDAO;
use DAO\AttendanceDAO;

class AttendanceModel
{
  private $username;

  public function __construct($args = [])
  {
    $this->username = Input::session('username');
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

  public function getAttendanceHistory()
  {
    $attendanceDAO = new AttendanceDAO();
    $moduleDAO = new ModuleDAO();

    $modules = $moduleDAO->getUserModules($this->username);

    // get term dates.
    $start = '2014-05-01';
    $end = '2015-05-01';

    $attendance = [];

    foreach ($modules as $module)
    {
      $code = $module->getModuleCode();
      $attendance[$code] = $attendanceDAO->selectModuleAttendanceRecords($this->username, $code, $start, $end);
    }
    return $attendance;
  }

}