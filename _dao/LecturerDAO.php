<?php namespace DAO;

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/Lecturer.php';

use PDO;
use Models\Entities\Lecturer;
use Database\DatabaseQuery;

class LecturerDAO
{
  private $db;

  public function getLecturerById($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select('SELECT l.idLecturer, s.Title,
                       s.FirstName, s.Surname, s.Mobile, s.Email
                       FROM Lecturer l
                       INNER JOIN Staff s ON s.idStaff = l.idLecturer
                       WHERE l.idLecturer = :id AND l.Status = "Active"');
    $data = $this->db->first();
    $lecturers = [];

    if ( $data )
    {
      extract($data);

      $lecturers[0] = new Lecturer();
      $lecturers[0]->setID($idLecturer);
      $lecturers[0]->setFullName($Title, $FirstName, $Surname);
      $lecturers[0]->setTelExt($Mobile);
      $lecturers[0]->setEmailAddress($Email);
    }
    return $lecturers;
  }

  public function getLecturersByModuleCode($code)
  {
    $this->db = new DatabaseQuery();
    $this->db->set('code', $code, PDO::PARAM_STR);
    $this->db->select('SELECT l.idLecturer, s.Title,
                       s.FirstName, s.Surname, s.Mobile, s.Email
                       FROM Lecturer l
                       INNER JOIN Staff s ON s.idStaff = l.idStaff
                       WHERE l.idLecturer IN (SELECT m.idLecturer
                                              FROM ModuleLecturer m
                                              WHERE m.idModuleCode = :code)');
    $data = $this->db->all();
    $lecturers = [];

    foreach ($data as $index => $lecturer)
    {
      extract($lecturer);

      $lecturers[] = new Lecturer();
      $lecturers[$index]->setID($idLecturer);
      $lecturers[$index]->setFullName($Title, $FirstName, $Surname);
      $lecturers[$index]->setTelExt($Mobile);
      $lecturers[$index]->setEmailAddress($Email);
    }

    return $lecturers;
  }
}