<?php

class PersonalTutorFeedback
{
  private $date;
  private $details;
  private $student;
  private $tutor;

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function setDetail($details)
  {
    $this->details = $details;
  }

  public function setStudent(Student $student)
  {
    $this->student = $student;
  }

  public function setTutor(Lecturer $tutor)
  {
    $this->tutor = $tutor;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function getStudent()
  {
    return $this->student;
  }

  public function getTutor()
  {
    return $this->tutor;
  }
}