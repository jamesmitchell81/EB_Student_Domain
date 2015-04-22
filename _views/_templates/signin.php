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

  <form id='signin-form' action="signin" method="post"> <!-- method='post'> -->
    <ul>
        <label class='signin-label' for="username">Username</label>
        <?php if ( array_key_exists('errors', $this->data) ) : ?>
          <?php if ( array_key_exists('username', $this->data['errors'] ) ) : ?>
           <span class='sign-in-error'><?= $this->data['errors']['username']; ?></span>
           <?php endif; ?>
        <?php endif; ?>
        <?php if ( array_key_exists('username', $this->data)) : ?>
          <input class='signin-text' type="text" name='username' id='username' value='<?= $this->data['username']; ?>'>
        <?php else : ?>
          <input class='signin-text' type="text" name='username' id='username'>
        <?php endif; ?>
        <label class='signin-label' for="password">Password</label>
        <?php if ( array_key_exists('errors', $this->data) ) : ?>
          <?php if ( array_key_exists('password', $this->data['errors'] ) ) : ?>
           <span class='sign-in-error'><?= $this->data['errors']['password']; ?></span>
           <?php endif; ?>
        <?php endif; ?>
        <input class='signin-text' type="password" name='password' id='password'>
        <input class='signin-btn' type="submit" value='Sign in'>
    </ul>
  </form>
</body>
</html>