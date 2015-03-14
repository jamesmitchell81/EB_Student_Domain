<?php

include 'util/Route.php';

use Util\Route;

// Diary.
$routes['dairy/:yyyy'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');
$routes['dairy/:yyyy/:mm'] = new Route('DiaryMonthController', 'DiaryMonthModel', 'DiaryMonthView');
$routes['dairy/:yyyy/:mm/:dd'] = new Route('DiaryDayController', 'DiaryDayModel', 'DiaryDayView');

// Noticifications.


// Personal details.



// Timetable.


