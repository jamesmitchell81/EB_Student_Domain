<?php

include_once './_models/_entities/Student.php';
include_once './_database/DatabaseQuery.php';

class StudentDAO
{
  private $db;

  public function getStudentByID($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select('SELECT idStudent, Title, FirstName, Surname, TermAddress,
                       HomeAddress, Mobile, Email, Gender
                       FROM Student WHERE idStudent = :id');
    $data = $this->db->first();

    $student = new Student();

    if ( $data )
    {
      $student->setStudentID($data['idStudent']);
      $student->setTitle($data['Title']);
      $student->setFirstName($data['FirstName']);
      $student->setLastName($data['Surname']);
      $student->setTermAddress($data['TermAddress']);
      $student->setHomeAddress($data['HomeAddress']);
      $student->setMobile($data['Mobile']);
      $student->setEmailAddress($data['Email']);
      $student->setGender($data['Gender']);
    }

    return $student;
  }
}