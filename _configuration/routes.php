<?php

include '_util/Route.php';

use Util\Route;

// Diary.
$routes['diary/:yyyy'] = new Route('DiaryYearModel', 'DiaryYearView', 'DiaryYearController');
$routes['diary/:yyyy/:mm'] = new Route('DiaryMonthModel', 'DiaryMonthView', 'DiaryMonthController');
$routes['diary/:yyyy/:mm/:dd'] = new Route('DiaryDayModel', 'DiaryDayView', 'DiaryDayController');

// Noticifications.
$routes['notifications'] = new Route('NoticificationModel', 'NoticificationView', 'NoticificationController');
// $routes['notifications/:id'] = new Route('NoticificationModel', 'NoticificationView', 'NoticificationController');
// $routes['notifications/:subject'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');

// Personal details.
$routes['personal-details'] = new Route('StudentDetailsModel', 'StudentDetailsView', 'StudentDetailsController');

// Timetable.
$routes['timetable'] = new Route('TimetableModel', 'TimetableView', 'TimetableController');

// Modules
$routes['modules'] = new Route('ModuleModel', 'ModuleView', 'ModuleController');
// $routes['modules/:code'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');

// Assignments
$routes['assignments'] = new Route('AssignmentsModel', 'AssignmentsView', 'AssignmentsController');
// $routes['assignments/:id'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');
// $routes['assignments/:module'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');

