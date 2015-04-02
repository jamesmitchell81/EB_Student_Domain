<?php

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/PersonalTutorFeedback.php';
include_once './_models/_entities/Student.php';
include_once './_models/_entities/Lecturer.php';
include_once './_dao/StudentDAO.php';
include_once './_dao/LecturerDAO.php';

class PersonalTutorDAO
{
  private $db;

  public function getPersonalTutorID($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT idLecturer FROM PersonalTutor WHERE idStudent = :username');
    $id = $this->db->first();

    return $id ? $id['idLecturer'] : false;
  }

  public function getPersonalTutorFeedback($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT l.idLecturer, f.Date, f.Detail
                      FROM PersonalTutor p
                      INNER JOIN Lecturer l ON l.idLecturer = p.idLecturer
                      INNER JOIN Staff sf ON sf.idStaff = l.idStaff
                      INNER JOIN Student st ON st.idStudent = p.idStudent
                      INNER JOIN PersonalTutorFeedback f ON f.AssignRef = p.AssignRef
                      WHERE st.idStudent = 20150001');
    $data = $this->db->all();

    $studentDAO = new StudentDAO();
    $student = $studentDAO->getStudentByID($username);

    $tutorFeedback = [];

    foreach ($data as $index => $feedback) {
      extract($feedback);

      $lecturerDAO = new LecturerDAO();
      $lecturer = $lecturerDAO->getLecturerByID($idLecturer);

      $tutorFeedback[] = new PersonalTutorFeedback();
      $tutorFeedback[$index]->setDate($Date);
      $tutorFeedback[$index]->setDetail($Detail);
      $tutorFeedback[$index]->setTutor($lecturer);
      $tutorFeedback[$index]->setStudent($student);
    }

    return $tutorFeedback;
  }
}