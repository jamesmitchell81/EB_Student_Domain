<footer>
  <nav id='nav-sub-1'>
    <ul>
      <li class='nav-sub-1-item b1'>
        <a class='b1' href='<?= BASE_PATH . Input::session('username') . "/notifications"; ?>'>Notifications</a>
      </li>
      <li class='nav-sub-1-item b2'>Course</li>
      <li class='nav-sub-1-item b3'>
        <a class='b3' href='<?= Navigation::defaultDiary(); ?>'>Diary</a>
      </li>
      <li class='nav-sub-1-item b4'>
        <a class='b4' href="<?= Navigation::personalDetails(); ?>">Me</a>
      </li>
    </ul>
  </nav>
</footer>