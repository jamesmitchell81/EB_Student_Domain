<?php

include '_util/Route.php';

/***** convention for use.
':username/domain/parameters/parameters/parameters...'
'20150001/diary/2015/04/02'
******/

class Routes
{
  private static $routes = [];

  private function __construct()
  {
    static::$routes['404'] = new Route('BadRouteModel', 'BadRouteView', 'BadRouteController');
    static::$routes['signin'] = new Route('SignInModel', 'SignInView', 'SignInController');
    static::$routes['home'] = new Route('DiaryYearModel', 'DiaryYearView', 'DiaryYearController');

    // Diary.
    static::$routes['diary/:yyyy'] = new Route('DiaryYearModel', 'DiaryYearView', 'DiaryYearController');
    static::$routes['diary/:yyyy/:mm'] = new Route('DiaryMonthModel', 'DiaryMonthView', 'DiaryMonthController');
    static::$routes['diary/:yyyy/:week'] = new Route('DiaryWeekModel', 'DiaryWeekView', 'DiaryWeekController');
    static::$routes['diary/:yyyy/:mm/:dd'] = new Route('DiaryDailyModel', 'DiaryDailyView', 'DiaryDailyController');

    static::$routes['diary/:action'] = new Route('DiaryAddModel', 'DiaryEditView', 'DiaryEditController');
    static::$routes['diary/add/:yyyy/:mm/:dd'] = new Route('DiaryEditModel', 'DiaryEditView', 'DiaryEditController');
    static::$routes['diary/add/:yyyy/:mm/:dd/:time'] = new Route('DiaryEditModel', 'DiaryEditView', 'DiaryEditController');
    static::$routes['diary/edit/:id'] = new Route('DiaryEditModel', 'DiaryEditView', 'DiaryEditController');
    static::$routes['diary/delete/:id'] = new Route('DiaryEditModel', 'DiaryEditView', 'DiaryEditController');

    // Noticifications.
    static::$routes['notifications'] = new Route('NotificationsModel', 'NotificationsView', 'NotificationsController');
    static::$routes['notifications/:id'] = new Route('NotificationsModel', 'NotificationsView', 'NotificationsController');
    static::$routes['notifications/:action/:id'] = new Route('NotificationsModel', 'NotificationsView', 'NotificationsController');

    // Personal details.
    static::$routes['personal-details'] = new Route('StudentDetailsModel', 'StudentDetailsView', 'StudentDetailsController');

    // Timetable.
    static::$routes['timetable'] = new Route('TimetableModel', 'TimetableView', 'TimetableController');
    static::$routes['timetable/:yyyy/:mm/:dd'] = new Route('TimetableModel', 'TimetableView', 'TimetableController');

    // Modules
    static::$routes['modules'] = new Route('ModuleModel', 'ModuleView', 'ModuleController');
    static::$routes['modules/:code'] = new Route('ModuleModel', 'ModuleView', 'ModuleController');

    // Assignments
    static::$routes['assignments'] = new Route('AssignmentsModel', 'AssignmentsView', 'AssignmentsController');
    static::$routes['assignments/:id'] = new Route('AssignmentsModel', 'AssignmentFrontSheetView', 'AssignmentsController');
    static::$routes['assignments/:code'] = new Route('AssignmentsModel', 'AssignmentsView', 'AssignmentsController');

    // Lecturers.
    static::$routes['lecturers'] = new Route('LecturerModel', 'LecturerView', 'LecturerController');
    static::$routes['lecturers/:lecturerid'] = new Route('LecturerModel', 'LecturerView', 'LecturerController');

    // Attendance
    static::$routes['attendance/:code/:period'] = new Route('AttendanceModel', 'AttendanceView', 'AttendanceController');
    static::$routes['attendance/:code'] = new Route('AttendanceModel', 'AttendanceView', 'AttendanceController');
    static::$routes['attendance/:period'] = new Route('AttendanceModel', 'AttendanceView', 'AttendanceController');

    // Personal Tutor Feedback
    static::$routes['tutor-sessions'] = new Route('PersonalTutorModel', 'PersonalTutorView', 'PersonalTutorController');
  }

  public static function getRoutes()
  {
    new static();
    return static::$routes;
  }

  public static function getRoute($path = '')
  {
    new static();

    if ( $path == '' ) return static::$routes['404']; // default..

    if ( !array_key_exists($path, static::$routes) )
    {
      return static::$routes['404']; // default..
    }

    return static::$routes[$path];
  }
}


