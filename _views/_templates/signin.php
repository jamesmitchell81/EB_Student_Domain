<?php include 'head.php'; ?>

  <img id='background' src='<?= BASE_PATH; ?>img/woodland-blue.png'/>

  <header class='signin-header'>
    <div class='title-wrap'>
      <!-- <img src="/~jm/group_project/img/ne  w_logo_web_3.svg" alt='logo-home' class="signin-logo"> -->
      <h1>Woodlands University College</h1>
    </div>
  </header>

  <form id='signin-form' action="" > <!-- method='post'> -->
    <ul>
        <label class='signin-label' for="username">Username</label>
        <input class='signin-text' type="text" name='username' id='username'>
        <label class='signin-label' for="password">Password</label>
        <input class='signin-text' type="text" name='password' id='password'>
        <input class='signin-btn' type="submit" value='Sign in'>
    </ul>
  </form>
</body>
</html>