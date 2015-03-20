<?php include "head.php"; ?>

<?php include "logo-column.php"; ?>

<div class="col-2">
<?php include "header-nav.php"; ?>
  <article id="content">


    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Notifications</span></h2>
    </div>

    <div class="wrap" id="content-workspace">

      <div class="notice-filter">
        <span class="notice-input-wrap">
          <label for="notice-search" class="notice-search-label">
            <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg width="20px" height="20px" viewBox="0 0 115 114" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>search</title>
              <g id="search" transform="translate(8, 8)" stroke="#787878" stroke-width="20">
                <path d="M66,64 L98,99" id="handle" transform="translate(82, 81) rotate(-3) translate(-82, -81) "></path>
                <circle id="lense" fill="transparent" transform="translate(43, 42) rotate(-3) translate(-43, -42) " cx="43" cy="42" r="40"></circle>
              </g>
            </svg>
          </label>
          <input id="notice-search" name="notice-search" type="text">
        </span>

        <ul class="notice-filter-tags">
          <li class="notice-filter-tag">#course</li>
          <li class="notice-filter-tag">#module</li>
          <li class="notice-filter-tag">#tutor</li>
          <li class="notice-filter-tag">#timetable</li>
          <li class="notice-filter-tag">#event</li>
          <li class="notice-filter-tag">#resources</li>
        </ul>
      </div>

      <?php if ( empty($this->data)) : ?>
        <p>You have no new notifications</p>
      <?php endif; ?>

      <?php foreach ($this->data as $notice) : ?>
      <div class="notice-block">
        <h3 class="notice-title">
          <?= $notice->getSubject(); ?>
        </h3>

        <span class="notice-date"><?= date('l jS F Y - H:i', $notice->getSentDatetime() ); ?></span>
        <span class="notice-sender"><?= $notice->getSender()->getFullName(); ?></span>

        <span class="notice-cat">
          <span class='notice-filter-tag'>#tutor, </span>
          <span class="notice-filter-tag">#module</span>
        </span>

        <p class="notice">
          <?= $notice->getBody(); ?>
        </p>
      </div><!-- end of notice block -->
      <?php endforeach; ?>

    </div><!-- #content-workspace -->
  </article>
</div><!-- .col-2 -->

<?php include "footer.php"; ?>