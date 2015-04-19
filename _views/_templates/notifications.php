
  <?php if ( empty($this->data)) : ?>
    <p>You have no new notifications</p>
  <?php endif; ?>

  <?php foreach ($this->data['notifications'] as $notice) : ?>
  <div class="notice-block">
    <h3 class="notice-title">
      <?= $notice->getSubject(); ?>
    </h3>

    <span class="notice-actions">
      <a class='btn btn-blue' href='notifications/delete/<?= "{$notice->getID()}"; ?>'>Delete</a>
      <a class='btn btn-green' href='notifications/save/<?= "{$notice->getID()}"; ?>'>Save</a>
    </span>

    <span class="notice-details"><?= date('l jS F Y - H:i', $notice->getSentDatetime() ); ?> &bull; <?= $notice->getSender()->getFullName(); ?></span>

    <p class="notice">
      <?= $notice->getBody(); ?>
    </p>
  </div><!-- end of notice block -->
  <?php endforeach; ?>
