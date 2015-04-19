<?php if ( empty($this->data['lecturer-details']) ) : ?>
  <p>No lecturers have been set at the moment</p>
<?php else : ?>

<?php foreach ($this->data['lecturer-details'] as $details) : ?>
  <table class='table-3'>
    <thead>
    </thead>
    <tbody>
      <tr>
        <th>Name</th>
        <td><?= $details->getFullName(); ?></td>
      </tr>
      <tr>
        <th>Tel Ext.</th>
        <td><?= $details->getTelExt(); ?></td>
      </tr>
      <tr>
        <th>Email Address</th>
        <td><?= $details->getEmailAddress(); ?></td>
      </tr>
      <th class='lecturer-modules' colspan='2'>Modules</th>
    </tr>
    <?php foreach ($details->getModules() as $module) : ?>
    <tr>
      <td class='table-cell-link' colspan='2'>
        <a href='<?= BASE_PATH . Input::session('username') . "/modules/{$module->getModuleCode()}"; ?>'>
        <?= "{$module->getModuleCode()} {$module->getTitle()}"; ?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

<?php endforeach; ?>
<?php endif; ?>