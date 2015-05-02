<?php

include_once './_models/_entities/Student.php';
include_once './_database/DatabaseQuery.php';

/**
 * Database Interaction for the Student Domain.
 */
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

      foreach ($this->getStudentQuailifications($data['idStudent']) as $q) {
        $student->addQuailification($q);
      }

    }

    return $student;
  }

  private function getStudentQuailifications($studentID)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $studentID);
    $this->db->select('SELECT Type, Grade, Subject
                       FROM StudentQualifications
                       WHERE idStudent = :username');
    $data = $this->db->all();

    $quailifications = [];

    foreach ( $data as $quailification )
    {
      $q = new Quailification();
      $q->setType($quailification['Type']);
      $q->setSubject($quailification['Subject']);
      $q->setGrade($quailification['Grade']);
      $quailifications[] = $q;
    }
    return $quailifications;
  }
}