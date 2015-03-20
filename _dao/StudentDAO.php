<?php namespace DAO;

include_once './_models/_entities/Student.php';
include_once './_database/DatabaseQuery.php';

use PDO;
use Models\Entities\Student;
use Database\DatabaseQuery;

class StudentDAO
{
  private $db;

  public function getStudentByID($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select('SELECT Title, FirstName, Surname FROM Student WHERE idStudent = :id');
    $data = $this->db->first();

    $student = new Student();
    $student->setTitle($data['Title']);
    $student->setFirstName($data['FirstName']);
    $student->setLastName($data['Surname']);
    // set others.

    return $student;
  }
}