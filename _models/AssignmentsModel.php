<?php

class AssignmentsModel
{
  private $username;
  private $args;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getAssignments()
  {
    if ( empty($this->args) )
    {
      return $dao->getUserAssignments($this->username);
    } else {
      return $dao->getModuleAssignment($this->args[':code']);
    }

  }

  public function getAssignmentSubmissions()
  {

  }

  public function getAssignmentGrades()
  {

  }

}