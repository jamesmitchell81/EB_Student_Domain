<?php include "head.php"; ?>

<?php include "logo-column.php"; ?>

<div class="col-2">
<?php include "header-nav.php"; ?>
  <article id="content">

    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Diary</span><span class='diary-date'><?= "{$today}" ?></span></h2>
    </div>

    <div class="wrap" id="content-workspace">
      <!-- <h2 class='diary-date'><?= "{$today}" ?></h2> -->

      <div class="diary-day">
        <?php foreach ($hours as $hour) : ?>
        <div class="diary-hour">
          <span class="diary-time"><?= "{$hour}"; ?></span>

        </div><!-- diary-hour -->
        <?php endforeach; ?>
      </div><!-- diary-day -->
    </div><!-- content-workspace -->
  </article><!-- #content -->

</div>
<!-- <?php include "_includes/footer.php"; ?>