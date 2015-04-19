<?php foreach($this->data['modules'] as $module) : ?>

<div class='notice-block'>
  <h3>
      <span class='page-action'><?= "{$module->getModuleCode()}"; ?></span>
      <span class='page-entity'><?= "{$module->getTitle()}"; ?></span>
  </h3>

  <div><!-- class='module-lecturers'>-->
    <p>Lecturers</p>
  <?php foreach ($module->getLecturers() as $lecturer) : ?>
      <h5>
        <a class='link-blue' href='<?= BASE_PATH . Input::session('username') . "/lecturers/{$lecturer->getID()}"; ?>'>
          <?= "{$lecturer->getFullName()}"; ?>
        </a>
      </h5>
  <?php endforeach; ?>
  </div>

  <h4>Module description</h4>
  <div class='notice'>
    <p>
      <?= "{$module->getDescription()}"; ?>
    </p>
  </div>
</div>

<?php endforeach; ?>
