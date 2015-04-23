<?php

class Quailification
{
  private $type;
  private $subject;
  private $grade;

  public function getQuailification()
  {
    return "{$this->type} {$this->subject} {$this->grade}";
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setGrade($grade)
  {
    $this->grade = $grade;
  }

  public function getGrade($grade)
  {
    return $this->grade;
  }

  public function setSubject($subject)
  {
    $this->subject = $subject;
  }

  public function getSubject()
  {
    return $this->subject;
  }

}