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

    $this->username = Input::session('username');
  }

  public function getMonth()
  {
    return $this->firstDayOfMonth->format('F Y');
  }

  public function getMonthRange()
  {
    $range = [];
    $tempDate = clone $this->firstDayOfMonth;
    $tempDate->sub(new DateInterval('P6M'));

    for ( $i = 0; $i < 16; $i++ )
    {
      $tempDate->add(new DateInterval('P1M'));
      $range[$tempDate->format('F Y')] = BASE_PATH . "{$this->username}/diary/{$tempDate->format('Y/m')}";
    }

    return $range;
  }

  public function getDiaryEvents()
  {

  }

  public function getCalenderStucture()
  {
    $monthNum = (int)$this->firstDayOfMonth->format('m');
    $yearNum = (int)$this->firstDayOfMonth->format('Y');
    $dt = clone $this->firstDayOfMonth;

    $days = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearNum); //http://php.net/manual/en/function.cal-days-in-month.php
    $rows = ($days / 7) + 1;

    $calender = [];
    $daysOfWeek = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    $row = 0;
    while ( $dt->format('M') == $this->firstDayOfMonth->format('M') )
    {

      foreach ($daysOfWeek as $day) {
        if ( $dt->format('D') == $day && $dt->format('M') == $this->firstDayOfMonth->format('M') )
        {
          $calender[$row][$day] = $dt->format('jS');
          $dt->modify("+1 days");
        }  else {
          $calender[$row][$day] = "";
        }
      }
      $row++;
    }

    return $calender;
  }

}