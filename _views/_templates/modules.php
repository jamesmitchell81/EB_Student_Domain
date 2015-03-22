<?php include "head.php"; ?>

<?php include "logo-column.php"; ?>

<div class="col-2">
<?php include "header-nav.php"; ?>
  <article id="content">


    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Modules</span></h2>
    </div>

    <div class="wrap" id="content-workspace">

    <?php foreach ($this->data as $module) :?>

      <div>
      <h3>
          <span class='page-action'><?= "{$module->getModuleCode()}"; ?></span>
          <span class='page-entity'><?= "{$module->getTitle()}"; ?></span>
      </h3>

      <p>Lecturers</p>
      <?php foreach ($module->getLecturers() as $lecturer) : ?>
        <p>
          <a href='<?= BASE_PATH . Util\Input::session('username') . "/lecturers/{$lecturer->getID()}"; ?>'>
            <?= "{$lecturer->getFullName()}"; ?>
          </a>
        </p>
      <?php endforeach; ?>

      <p>Module description</p>
      <p>
        <?= "{$module->getDescription()}"; ?>
      </p>
    </div>

    <?php endforeach; ?>

    </div><!-- #content-workspace -->
  </article>
</div><!-- .col-2 -->

<?php include "footer.php"; ?>


