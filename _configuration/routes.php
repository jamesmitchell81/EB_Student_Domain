<?php namespace Configuration;

include '_util/Route.php';

use Util\Route;

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

    // Diary.
    static::$routes['diary/:yyyy'] = new Route('DiaryYearModel', 'DiaryYearView', 'DiaryYearController');
    static::$routes['diary/:yyyy/:mm'] = new Route('DiaryMonthModel', 'DiaryMonthView', 'DiaryMonthController');
    static::$routes['diary/:yyyy/:mm/:dd'] = new Route('DiaryDayModel', 'DiaryDayView', 'DiaryDayController');

    // Noticifications.
    static::$routes['notifications'] = new Route('NoticificationModel', 'NoticificationView', 'NoticificationController');
    // $routes['notifications/:id'] = new Route('NoticificationModel', 'NoticificationView', 'NoticificationController');
    // $routes['notifications/:subject'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');

    // Personal details.
    static::$routes['personal-details'] = new Route('StudentDetailsModel', 'StudentDetailsView', 'StudentDetailsController');

    // Timetable.
    static::$routes['timetable'] = new Route('TimetableModel', 'TimetableView', 'TimetableController');

    // Modules
    static::$routes['modules'] = new Route('ModuleModel', 'ModuleView', 'ModuleController');
    // $routes['modules/:code'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');

    // Assignments
    static::$routes['assignments'] = new Route('AssignmentsModel', 'AssignmentsView', 'AssignmentsController');
    // $routes['assignments/:id'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');
    // $routes['assignments/:module'] = new Route('DiaryYearController', 'DiaryYearModel', 'DiaryYearView');
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


