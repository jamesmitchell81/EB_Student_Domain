<?php

include '_entities/Module.php';
include './_dao/ModuleDAO.php';
include './_dao/LecturerDAO.php';

use Util\Input;
use Models\Entities\Module;
use DAO\LecturerDAO;
use DAO\ModuleDAO;

class ModuleModel
{
  private $args;
  private $username;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getModules()
  {

    if ( empty($this->args) ) {
      $dao = new ModuleDAO();
      return $dao->getUserModules($this->username);
    } else {
      $code = array_shift($this->args);

      $moduleData = new ModuleDAO();
      $lecturerData = new LecturerDAO();

      $module = new Module();

      $module = $moduleData->getModuleById($code);
      $lecturers = $lecturerData->getLecturersByModuleCode($code);

      $module->setLecturers($lecturers);

      return $module;
    }
  }

}