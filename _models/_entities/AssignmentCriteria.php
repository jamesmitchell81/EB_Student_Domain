<?php

class AssignmentCriteria
{
  private $title;
  private $details;
  private $weighting;

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setDetails($details)
  {
    $this->details = $details;
  }

  public function setWeighting($weighting)
  {
    $this->weighting = $weighting;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getDetails()
  {
    return $this->details;
  }

  public function getWeighting()
  {
    return $this->weighting;
  }

  public function getWeightingPC()
  {
      return $this->weighting * 100 . "%";
  }

}