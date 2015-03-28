<?php

include_once './_dao/AssignmentDAO.php';

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
    $dao = new AssignmentDAO();

    if ( empty($this->args) )
    {
      return $dao->getUserAssignments($this->username);
    } else {
      return $dao->getAssignmentsByModuleCode($this->args[':code']);
    }
  }

  public function getAssignmentSummary()
  {
    $summary = [];
    $assignDAO = new AssignmentDAO();
    $moduleDAO = new ModuleDAO();

    if ( empty($this->args) ) {
      $modules = $moduleDAO->getUserModules($this->username);
      foreach ($modules as $module) {
        $summary[$module->getModuleCode()] = $assignDAO->getAssignmentSummary($module->getModuleCode());
      }
    } else {
      $summary[$this->args[':code']] = $assignDAO->getAssignmentSummary($this->args[':code']);
    }

    return $summary;
  }

}