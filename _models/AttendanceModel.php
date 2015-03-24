<?php

include './_dao/AttendanceDAO.php';

use Util\Input;
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

}