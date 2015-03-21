<?php namespace Util;

use DateTime;

class Month
{
  const DAYS_IN_WEEK = 7;
  private $daysCount;
  private $weeksCount;
  private $firstDate;
  private $year;
  private $month;
  private $weeks;

  public function __construct(DateTime $dt)
  {
    $this->year = $dt->format('Y');
    $this->month = $dt->format('m');
    $this->firstDate = new DateTime();
    $this->firstDate->setDate((int)$this->year, (int)$this->month, 1);

    $this->setDaysInMonth();
    $this->setWeekCount();
  }

  public function getWeeks()
  {
    $this->defineWeekStructure();

    $week = 0;
    $dt = $this->firstDate;
    for ( $i = 0; $i < $this->daysCount; $i++ )
    {
      $weekday = $dt->format('D');
      $this->weeks[$week][$weekday] = $this->createDay($dt);
      if ( $dt->format('D') == 'Sun' ) $week++;
      $dt->modify('+1 day');
    }

    return $this->weeks;
  }

  private function createDay($dt)
  {
    return [
      'date'    => $dt->format('d'),
      'weekday' => $dt->format('D'),
      'href'    => $dt->format('Y/m/d')
    ];
  }

  private function setDaysInMonth()
  {
    $nextMonth = new DateTime();
    $nextMonth->setDate($this->year, ($this->month + 1), 1);
    $this->daysCount = $this->firstDate->diff($nextMonth)->days;
  }

  private function setWeekCount()
  {
    $this->weeksCount = ceil($this->daysCount / Month::DAYS_IN_WEEK);
  }

  private function defineWeekStructure()
  {
    for ( $i = 0; $i < $this->weeksCount; $i++ )
    {
      $this->weeks[$i] = [
        'Mon' => [],
        'Tue' => [],
        'Wed' => [],
        'Thu' => [],
        'Fri' => [],
        'Sat' => [],
        'Sun' => []
      ];
    }
  }

}