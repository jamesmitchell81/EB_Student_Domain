<?php namespace DAO;

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/Assignment.php';

use PDO;
use Database\DatabaseQuery;
use Models\Entities\Assignment;

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

        foreach ($data as $index => $assignment) {

            extract($assignment);

            $lecturer = $lecturerDAO.getLecturerById($idLecturer);

            $assignments[$index]->setTitle("");
            $assignments[$index]->setReleaseDate("");
            $assignments[$index]->setDueDate("");

            $assignments[$index]->setLecturer("");

            $assignments[$index]->setModule("");
            // ...

        }




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