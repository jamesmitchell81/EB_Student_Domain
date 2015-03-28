<?php

class AssignmentSummary
{
  private $assignment;
  private $assignmentSubmission;

  public function setAssignment(Assignment $assignment)
  {
    $this->assignment = $assignment;
  }

  public function setAssignmentSubmission(AssignmentSubmission $assignmentSubmission)
  {
    $this->assignmentSubmission = $assignmentSubmission;
  }

  public function getAssignment()
  {
    return $this->assignment;
  }

  public function getAssignmentSubmission()
  {
    return $this->assignmentSubmission;
  }

}