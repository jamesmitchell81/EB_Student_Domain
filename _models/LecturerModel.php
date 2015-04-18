<?php

include_once './_dao/LecturerDAO.php';

class LecturerModel
{
  private $args;
  private $username;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getLecturerDetails()
  {
    $dao = new LecturerDAO();
    if ( !empty($this->args) ) {
      $lecturer[] = $dao->getLecturerById($this->args[':lecturerid']);
      return $lecturer;
    } else {
      return $dao->getLecturerByStudent($this->username);
    }
  }


}