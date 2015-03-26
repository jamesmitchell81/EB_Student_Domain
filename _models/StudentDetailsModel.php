<?php

include './_dao/StudentDAO.php';
include './_dao/ModuleDAO.php';
include '_entities/Module.php';

class StudentDetailsModel
{
  private $details;
  private $username;

  public function __construct()
  {
    $this->username = Input::session('username');
  }

  public function getStudentDetails()
  {
    $studentData = new StudentDAO();
    $moduleData = new ModuleDAO();
    $student = new Student();
    $modules = new Module();

    $student = $studentData->getStudentByID($this->username);
    $modules = $moduleData->getUserModules($this->username);

    $student->setModules($modules);
    return $student;
  }

}