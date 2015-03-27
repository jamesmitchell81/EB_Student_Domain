
<?php if ( empty($this->data['lecturer-details']) ) : ?>
  <p>No lecturers have been set at the moment</p>
<?php else : ?>

<?php foreach ($this->data['lecturer-details'] as $details) : ?>
  <table>
    <thead>
    </thead>
    <tbody>
      <tr>
        <td>Name</td>
        <td><?= $details->getFullName(); ?></td>
      </tr>
      <tr>
        <td>Tel Ext.</td>
        <td><?= $details->getTelExt(); ?></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><?= $details->getEmailAddress(); ?></td>
      </tr>
      <td colspan='2'>Modules</td>
    </tr>
    <?php foreach ($details->getModules() as $module) : ?>
    <tr>
      <td colspan='2'>
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