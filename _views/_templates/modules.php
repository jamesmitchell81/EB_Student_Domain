  <?php foreach($this->data['modules'] as $module) : ?>

  <div>
  <h3>
      <span class='page-action'><?= "{$module->getModuleCode()}"; ?></span>
      <span class='page-entity'><?= "{$module->getTitle()}"; ?></span>
  </h3>

  <p>Lecturers</p>
  <?php foreach ($module->getLecturers() as $lecturer) : ?>
    <p>
      <a href='<?= BASE_PATH . Input::session('username') . "/lecturers/{$lecturer->getID()}"; ?>'>
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
