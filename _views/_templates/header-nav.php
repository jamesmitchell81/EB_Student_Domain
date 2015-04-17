<div id='logo-header' class='logo-header'>
  <img src="/~jm/group_project/img/header-logo.png" alt='logo-home' class="header-logo">
  <h3 class='logo-header-title'>
    Woodland University College
  </h3>
  <a class='logo-header-sign-out' href='/~jm/group_project/'>Sign out</a>
</div>

<div class="col-2">
<header>
  <nav id='nav-core-1'>
    <ul>
      <li class='nav-core-1-item g1'>
        <a class='g1' href='<?= BASE_PATH . Input::session('username') . "/notifications"; ?>'>Notifications</a>
      </li>
      <li class='nav-core-1-item g2'>Course</li>
      <li class='nav-core-1-item g3'>
        <a class='g3' href='<?= Navigation::defaultDiary(); ?>'>Diary</a>
      </li>
      <li class='nav-core-1-item g4'>
        <a class='g4' href="<?= Navigation::personalDetails(); ?>">Me</a>
      </li>
    </ul>
  </nav>

  <nav id='nav-core-2'>
    <ul class='nav-core-2-list g1'>
      <li class='nav-core-2-item'>
        <a href='<?= Navigation::getNotifications(); ?>'>View</a>
      </li>
    </ul>
    <ul class='nav-core-2-list g2'>
      <li class='nav-core-2-item'>
        <a href='<?= Navigation::defaultTimetable(); ?>'>Timetables</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::defaultAttendance(); ?>">Attendance</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::modules(); ?>">Modules</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::assignments(); ?>">Assignments</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::lecturers(); ?>">Lecturers</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::personalTutor(); ?>">Personal Tutor Feedback</a>
      </li>
    </ul>
    <ul class='nav-core-2-list g3'>
      <li class='nav-core-2-item'>
        <a href='<?= Navigation::defaultDailyDiary(); ?>'>Today</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::defaultWeekDiary(); ?>">This Week</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::defaultMonthDiary(); ?>">This Month</a>
      </li>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::defaultYearDiary(); ?>">Year</a>
      </li>
    </ul>
    <ul class='nav-core-2-list g4'>
      <li class='nav-core-2-item'>
        <a href="<?= Navigation::personalDetails(); ?>">Personal Details</a>
      </li>
    </ul>
  </nav>
</header>
