<?php include 'head.php'; ?>

  <header class='signin-header'>
    <div class='img-wrap'>
      <img src="/~jm/group_project/img/new_logo_web_3.svg" alt='logo-home' class="signin-logo">
    </div>
    <h1>Woodlands University College</h1>
  </header>

  <form id='signin-form' action="" > <!-- method='post'> -->
    <ul>
        <label class='signin-label' for="username">Username</label>
        <input class='signin-text' type="text" name='username' id='username'>
        <label class='signin-label' for="password">Password</label>
        <input class='signin-text' type="text" name='password' id='password'>
        <input class='signin-btn' type="submit">
    </ul>
  </form>
</body>
</html>