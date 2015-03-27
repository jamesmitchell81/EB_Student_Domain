<?php

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

  // public function addSession($session)
  // {
  //   $this->sessions[] = $session;
  // }

  public function getSessions()
  {
    return $this->sessions;
  }

  public function hasSession($key)
  {
    return array_key_exists($key, $this->sessions);
  }

  public function getSession($key)
  {
    return $this->sessions[$key];
  }

  public function addSession($date, $result)
  {
    $this->sessions[$date] = $result;
  }
}