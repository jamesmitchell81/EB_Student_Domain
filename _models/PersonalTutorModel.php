<?php

include_once './_util/Input.php';
include_once './_dao/PersonalTutorDAO.php';
include_once './_dao/LecturerDAO.php';

class PersonalTutorModel
{
  private $username;

  public function __construct()
  {
    $this->username = Input::session('username');
  }

  public function getPersonalTutorDetails()
  {
    $tutorDAO = new PersonalTutorDAO();
    $lecturerDAO = new LecturerDAO();
    $lectuerID = $tutorDAO->getPersonalTutorID($this->username);

    if ( $lectuerID ) {
      return $lecturerDAO->getLecturerById($lectuerID);
    }

    return [];
  }

  public function getPersonalTutorFeedback()
  {
    $dao = new PersonalTutorDAO();
    return $dao->getPersonalTutorFeedback($this->username);
  }
}