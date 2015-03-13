<?php namespace Models;

class AssignmentSubmission
{
    private $grade;
    private $submission_date;

    /**
     * @return mixed
     */
    public function getSubmissionDate()
    {
        return $this->submission_date;
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
