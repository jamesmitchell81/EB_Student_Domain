<?php

include_once './_database/DatabaseQuery.php';

include_once './_dao/LecturerDAO.php';
include_once './_dao/ModuleDAO.php';
include_once './_models/_entities/Assignment.php';
include_once './_models/_entities/AssignmentSubmission.php';
include_once './_models/_entities/AssignmentSummary.php';

class AssignmentDAO
{
    private $db;

    public function getAssignmentByID($id)
    {
        $this->db = new DatabaseQuery();
        $this->db->setInt('id', $id);
        $this->db->select('SELECT a.idAssignment, a.idModuleCode, a.idLecturer, a.Title, a.ReleaseDate, a.DueDate, a.Weighting
                           FROM Assignment a WHERE a.idAssignment = :id');
        $data = $this->db->first();

        $assignment = new Assignment();
        $lecturerDAO = new LecturerDAO();
        $moduleDAO = new ModuleDAO();

        if ( $data )
        {
            extract($data);

            $lecturer = $lecturerDAO->getLecturerById($idLecturer);
            $module = $moduleDAO->getModuleById($idModuleCode);

            $assignment->setTitle($Title);
            $assignment->setReleaseDate($ReleaseDate);
            $assignment->setDueDate($DueDate);
            $assignment->setLecturer($lecturer);
            $assignment->setModule($module);
        }

        return $assignment;
    }

    public function getAssignmentsByModuleCode($code)
    {
        $this->db = new DatabaseQuery();
        $this->db->set('code', $code, PDO::PARAM_STR);
        $this->db->select('SELECT a.idAssignment FROM Assignment a
                           WHERE a.idModuleCode = :code');
        $data = $this->db->all();

        $assignments = [];

        foreach ($data as $index => $assignment) {

            extract($assignment);
            $assignments[] = $this->getAssignmentByID($idAssignment);
        }

        return $assignments;
    }

    public function getUserAssignments($username)
    {
        $this->db = new DatabaseQuery();
        $this->db->set('username', $username, PDO::PARAM_STR);
        $this->db->select('SELECT a.idAssignment
                           FROM Assignment a
                           INNER JOIN ModuleStudents ms ON ms.idModuleCode = a.idModuleCode
                           WHERE ms.idStudent = :username');
        $data = $this->db->all();

        $assignments = [];

        foreach ($data as $index => $assignment) {

            extract($assignment);
            $assignments[] = $this->getAssignmentByID($idAssignment);
        }

        return $assignments;
    }

    private function getAssignmentSubmission($assignment, $username)
    {
        $this->db = new DatabaseQuery();
        $this->db->setInt('assignment', $assignment);
        $this->db->setInt('username', $username);
        $this->db->select('SELECT idAssignment, idStudent, Grade, DateSubmitted
                          FROM AssignmentSubmission
                          WHERE idAssignment = :assignment
                          AND idStudent = :username');
        $data = $this->db->first();

        $submission = new AssignmentSubmission();

        if ( $data )
        {
            extract($data);

            $submission->setStudentID($idAssignment);
            $submission->setAssignmentID($idStudent);
            $submission->setSubmissionDate($DateSubmitted);
            $submission->setGrade($Grade);
        }
        return $submission;
    }

    public function getAssignmentSummary($code)
    {
        $this->db = new DatabaseQuery();
        $this->db->setInt('code', $code);
        $this->db->select('SELECT a.idAssignment, s.idStudent
                           FROM Assignment a
                           LEFT JOIN AssignmentSubmission s ON s.idAssignment = a.idAssignment
                           WHERE a.idModuleCode = :code
                           ORDER BY a.idModuleCode, a.DueDate');
        $data = $this->db->all();

        // $assignment = new Assignment();
        // $submission = new AssignmentSubmission();

        foreach($data as $index => $summary)
        {
            extract($summary);

            $submission = $this->getAssignmentSubmission($idAssignment, $idStudent);
            $assignment = $this->getAssignmentByID($idAssignment);

            $assignmentSummary[] = new AssignmentSummary();
            $assignmentSummary[$index]->setAssignment($assignment);
            $assignmentSummary[$index]->setAssignmentSubmission($submission);
        }
        return $assignmentSummary;
    }
}




