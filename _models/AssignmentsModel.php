<?php

include_once './_dao/AssignmentDAO.php';
include_once './_dao/StudentDAO.php';

class AssignmentsModel
{
  private $username;
  private $args;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getStudentDetails()
  {
    $dao = new StudentDAO();
    return $dao->getStudentByID($this->username);
  }

  public function getAssignments()
  {
    $dao = new AssignmentDAO();

    if ( !empty($this->args) )
    {
      if ( array_key_exists(':code', $this->args))
      {
        return $dao->getAssignmentsByModuleCode($this->args[':code']);
      }
      $assignment[] = $dao->getAssignmentByID($this->args[':id']); // ?
      return $assignment;
    }
    return $dao->getUserAssignments($this->username);
  }

  public function getAssignmentSummary()
  {
    $summary = [];
    $assignDAO = new AssignmentDAO();
    $moduleDAO = new ModuleDAO();

    if ( !empty($this->args) )
    {
        if ( array_key_exists(':code', $this->args))
        {
          return $summary[$this->args[':code']] = $assignDAO->getAssignmentSummary($this->args[':code']);
        }
        return [];
    }

    $modules = $moduleDAO->getUserModules($this->username);
    foreach ($modules as $module) {
      $summary[$module->getModuleCode()] = $assignDAO->getAssignmentSummary($module->getModuleCode());
    }
    return $summary;
  }

}