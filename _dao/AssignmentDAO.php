<?php

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/Assignment.php';

class AssignmentDAO
{
    private $db;

    public function getAssignmentsByModuleCode($code)
    {
        $this->db = new DatabaseQuery();
        $this->db->set('code', $code, PDO::PARAM_STR);
        $this->dt->select('SELECT a.idAssignment, a.idModuleCode, a.idLecturer,
                                  a.Title, a.ReleaseDate, a.DueDate, a.Weighting
                           FROM Assignment a
                           WHERE a.idModuleCode = :code');
        $data = $this->all();

        $assignments = [];

        $lecturerDAO = new LecturerDAO();
        $moduleDAO = new ModuleDAO();

        foreach ($data as $index => $assignment) {

            extract($assignment);

            $lecturer = $lecturerDAO->getLecturerById($idLecturer);
            $module = $moduleDAO->getModuleById($idModuleCode);

            $assignments[$index]->setTitle($Title);
            $assignments[$index]->setReleaseDate($ReleaseDate);
            $assignments[$index]->setDueDate($DueDate);
            $assignments[$index]->setLecturer($lecturer);
            $assignments[$index]->setModule($module);
        }

        return $assignments;
    }

    public function getAssignmentGrades($username, $id)
    {
        $this->db = new DatabaseQuery();
        $this->db->setInt('username', $username);
        $this->db->setInt('id', $id);
        $this->dt->select('');

        $data = $this->all();
    }

    public function getUserAssignments($username)
    {
        $this->db = new DatabaseQuery();
        $this->db->set('username', $username, PDO::PARAM_STR);
        $this->dt->select('SELECT a.idAssignment, a.idModuleCode, a.idLecturer,
                                  a.Title, a.ReleaseDate, a.DueDate, a.Weighting
                           FROM Assignment a
                           INNER JOIN ModuleStudents ms ON ms.idModuleCode = a.idModuleCode
                           WHERE ms.idStudent = :username');
        $data = $this->all();

    }

    public function getSubmittedAssignmentsByUser($username)
    {

    }




}