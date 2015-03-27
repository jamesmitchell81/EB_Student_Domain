<?php

include '_entities/Module.php';
include './_dao/ModuleDAO.php';
include './_dao/LecturerDAO.php';

class ModuleModel
{
  private $args;
  private $username;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getModules()
  {

    $moduleData = new ModuleDAO();
    $lecturerData = new LecturerDAO();

    if ( empty($this->args) ) {
      $modules = $moduleData->getUserModules($this->username);
    } else {
      $code = array_shift($this->args);
      $modules = $moduleData->getModuleById($code);
    }

    foreach ($modules as $module) {
      $code = $module->getModuleCode();
      $lecturers = $lecturerData->getLecturersByModuleCode($code);
      $module->setLecturers($lecturers);
    }

    return $modules;
  }

}