<?php foreach($this->data['modules'] as $module) : ?>

<div class='module'>
  <h3 class='module-header'>
      <span class='page-action'><?= "{$module->getModuleCode()}"; ?></span>
      <span class='page-entity'><?= "{$module->getTitle()}"; ?></span>
  </h3>

  <div class='module-lecturers'>
    <p>Lecturers</p>
  <?php foreach ($module->getLecturers() as $lecturer) : ?>
      <p>
        <a href='<?= BASE_PATH . Input::session('username') . "/lecturers/{$lecturer->getID()}"; ?>'>
          <?= "{$lecturer->getFullName()}"; ?>
        </a>
      </p>
  <?php endforeach; ?>
  </div>

  <div class='module-description'>
    <h4>Module description</h4>
    <p>
      <?= "{$module->getDescription()}"; ?>
    </p>
  </div>
</div>

<?php endforeach; ?>
