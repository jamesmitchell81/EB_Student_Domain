<?php

class DiaryMonthModel
{
  private $username;
  private $args = [];
  private $month;
  private $firstDayOfMonth;

  public function __construct($args = [])
  {
    $this->args = $args;

    if ( !empty($this->args) ){
      $this->firstDayOfMonth = new DateTime();
      $this->firstDayOfMonth->setDate($this->args[':yyyy'], $this->args[':mm'], 1);
    }

    var_dump($this->firstDayOfMonth);
  }

  public function getMonthRange()
  {
    $range = [];
    $tempDate = clone $this->firstDayOfMonth;
    $tempDate->sub(new DateInterval('P6M'));

    for ( $i = 0; $i < 6; $i++ )
    {
      $tempDate->add(new DateInterval('P1M'));
      $range[$tempDate->format('F')] = BASE_PATH . "{$this->username}/{$tempDate->format('Y/m')}";
    }

    return $range;
  }

  public function getDiaryEvents()
  {

  }

}