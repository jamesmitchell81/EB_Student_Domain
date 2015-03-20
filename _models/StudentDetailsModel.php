<?php

include './_dao/StudentDAO.php';

use Util\Input;
use Models\Entities\Student;
use DAO\StudentDAO;

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
    $dao = new StudentDAO();
    return $dao->getStudentByID($this->username);
  }

}