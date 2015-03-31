
      <?php if ( empty($this->data)) : ?>
        <p>You have no new notifications</p>
      <?php endif; ?>

      <?php foreach ($this->data['notifications'] as $notice) : ?>
      <div class="notice-block">
        <h3 class="notice-title">
          <?= $notice->getSubject(); ?>
        </h3>

        <span class="notice-date"><?= date('l jS F Y - H:i', $notice->getSentDatetime() ); ?></span>
        <span class="notice-sender"><?= $notice->getSender()->getFullName(); ?></span>
        <a class='notice-mark-read' href='notifications/delete/<?= "{$notice->getID()}"; ?>'>Delete</a>
        <a class='notice-mark-read' href='notifications/save/<?= "{$notice->getID()}"; ?>'>Save</a>

        <span class="notice-cat">
          <span class='notice-filter-tag'>#tutor, </span>
          <span class="notice-filter-tag">#module</span>
        </span>

        <p class="notice">
          <?= $notice->getBody(); ?>
        </p>
      </div><!-- end of notice block -->
      <?php endforeach; ?>
