<?php

class AssignmentSubmission
{
    private $grade;
    private $submission_date;
    private $studentID;
    private $assignmentID;

    public function getAssignmentID()
    {

    }

    public function getStudentID()
    {

    }

    public function setStudentID($id)
    {
        $this->studentID = $id;
    }

    public function setAssignmentID($id)
    {
        $this->assignmentID = $id;
    }

    /**
     * @return mixed
     */
    public function getSubmissionDate($format = '')
    {
        if ( $format == '' ) {
            return $this->submission_date;
        }
        return date($format, strtotime($this->submission_date));
    }

    /**
     * @param mixed $submission_date
     */
    public function setSubmissionDate($submission_date)
    {
        $this->submission_date = $submission_date;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }
}
