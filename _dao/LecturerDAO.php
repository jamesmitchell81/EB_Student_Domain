<?php

include_once './_database/DatabaseQuery.php';
include_once './_dao/ModuleDAO.php';
include_once './_models/_entities/Lecturer.php';

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
                       INNER JOIN Staff s ON s.idStaff = l.idStaff
                       WHERE l.idLecturer = :id AND s.Status = "Active"');
    $data = $this->db->first();
    // $lecturers = [];

    $moduleDAO = new ModuleDAO();

    if ( $data )
    {
      extract($data);

      $modules = $moduleDAO->getLecturerModules($idLecturer);
      $lecturers = new Lecturer();
      $lecturers->setID($idLecturer);
      $lecturers->setFullName($Title, $FirstName, $Surname);
      $lecturers->setTelExt($Mobile);
      $lecturers->setEmailAddress($Email);
      $lecturers->setModules($modules);
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

    $moduleDAO = new ModuleDAO();

    foreach ($data as $index => $lecturer)
    {
      extract($lecturer);

      $modules = $moduleDAO->getLecturerModules($idLecturer);

      $lecturers[] = new Lecturer();
      $lecturers[$index]->setID($idLecturer);
      $lecturers[$index]->setFullName($Title, $FirstName, $Surname);
      $lecturers[$index]->setTelExt($Mobile);
      $lecturers[$index]->setEmailAddress($Email);
      $lecturers[$index]->setModules($modules);
    }
    return $lecturers;
  }

  public function getLecturerByStudent($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT l.idLecturer, s.Title,
                       s.FirstName, s.Surname, s.Mobile, s.Email
                       FROM Lecturer l
                       INNER JOIN Staff s ON s.idStaff = l.idStaff
                       INNER JOIN ModuleLecturer m ON m.idLecturer = l.idLecturer
                       INNER JOIN ModuleStudents ms ON ms.idModuleCode = m.idModuleCode
                       WHERE idStudent = :username;');

    $data = $this->db->all();

    $lecturers = [];

    $moduleDAO = new ModuleDAO();

    foreach ($data as $index => $lecturer)
    {
      extract($lecturer);

      $modules = $moduleDAO->getLecturerModules($idLecturer);

      $lecturers[] = new Lecturer();

      $lecturers[$index]->setID($idLecturer);
      $lecturers[$index]->setFullName($Title, $FirstName, $Surname);
      $lecturers[$index]->setTelExt($Mobile);
      $lecturers[$index]->setEmailAddress($Email);
      $lecturers[$index]->setModules($modules);
    }
    return $lecturers;

  }
}