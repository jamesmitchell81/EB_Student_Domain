<?php namespace Models\Entities;

class Attendance
{
  private $student;
  private $module;
  private $sessions = [];

  public function setStudent($id)
  {
    $this->student = $id;
  }

  public function setModule($module)
  {
    $this->module = $module;
  }

  public function addSession(AttendanceSession $session)
  {
    $this->sessions[] = $session;
  }
}