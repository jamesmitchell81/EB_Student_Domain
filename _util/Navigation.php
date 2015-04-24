<?php

include_once 'Input.php';

class Navigation
{
  public static function defaultDiary()
  {
    $username = Input::session('username');
    $dt = date('Y/m/d');
    return BASE_PATH . $username . "/diary/" . $dt;
  }

  public static function defaultTimetable()
  {
    $username = Input::session('username');
    $dt = date('Y/m/d');
    return BASE_PATH . $username . "/timetable/" . $dt;
  }

  public static function getNotifications()
  {
    $username = Input::session('username');
    return BASE_PATH . $username . "/notifications";
  }

  public static function defaultAttendance()
  {
    $username = Input::session('username');
    return BASE_PATH . $username . "/attendance/2014-2015";
  }

  public static function modules()
  {
    $username = Input::session('username');
    return BASE_PATH . $username . "/modules";
  }

  public static function assignments()
  {
    $username = Input::session('username');
    $dt = date('Y/m/d');
    return BASE_PATH . $username . "/assignments";
  }

  public static function lecturers()
  {
    $username = Input::session('username');
    return BASE_PATH . $username . "/lecturers";
  }

  public static function personalTutor()
  {
    $username = Input::session('username');
    $dt = date('Y/m/d');
    return BASE_PATH . $username . "/tutor-sessions";
  }

  public static function defaultDailyDiary()
  {
    $username = Input::session('username');
    $dt = date('Y/m/d');
    return BASE_PATH . $username . "/diary/" . $dt;
  }

  public static function defaultMonthDiary()
  {
    $username = Input::session('username');
    $dt = date('Y/m');
    return BASE_PATH . $username . "/diary/" . $dt;
  }

  public static function defaultYearDiary()
  {
    $username = Input::session('username');
    $dt = date('Y');
    return BASE_PATH . $username . "/diary/" . $dt;
  }

  public static function personalDetails()
  {
    $username = Input::session('username');
    $dt = date('Y');
    return BASE_PATH . $username . "/personal-details";
  }
}