<?php namespace Models\Entities;

class AttendanceSummary
{
  private $student;
  private $module;
  private $total;
  private $results = [];

  public function setStudent(Student $student)
  {
    $this->student = $student;
  }

  public function setModule(Module $module)
  {
    $this->module = $module;
  }

  public function setResult($resultKey, $resultValue)
  {
    $this->results[$resultKey] = $resultValue;
  }

  public function setTotal($total = 0)
  {
    $this->total = $total;
  }

  public function getStudent()
  {
    return $this->student;
  }

  public function getModule()
  {
    return $this->module;
  }

  public function getResult($key)
  {
    return isset($this->results[$key]) ? $this->results[$key] : 0;
  }

  public function getTotal()
  {
    return $this->total;
  }

}