  <img id='background' src='<?= BASE_PATH; ?>img/woodland-blue-blur.png'/>

  <header class='signin-header'>
    <div class='title-wrap'>
      <img src='<?= BASE_PATH; ?>img/tree-white-simple-border.png' alt='logo-home' class="signin-logo">
      <h1>Woodlands University College</h1>
    </div>
  </header>

  <div class='signin-sub-header'>
    <h2>
      Student Supplement
    </h2>
  </div>

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