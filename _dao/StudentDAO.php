<?php namespace DAO;

include '../_database/DatabaseQuery.php';
include '../_models/Student.php';

use PDO;
use Models\Student;
use Database\DatabaseQuery;

class StudentDAO
{
  private $db;

    /**
     * @param $id
     * @return Student
     */
    public function getStudentByID($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select("SELECT Title, FirstName, Surname FROM Student WHERE idStudent = :id");
    $data = $this->db->first();

    $student = new Student();
    $student->setTitle($data['Title']);
    $student->setFirstName($data['FirstName']);
    $student->setLastName($data['Surname']);
    // set others.

    return $student;
  }
}

$dao = new StudentDAO();

$student = $dao->getStudentByID(1);
echo $student->getFullName();



