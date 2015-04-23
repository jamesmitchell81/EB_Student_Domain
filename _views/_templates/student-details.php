<table class='table-3'>
  <thead>
  </thead>
  <tbody>
    <tr>
      <th>Student ID</th>
      <td><?= $this->data['details']->getStudentId(); ?></td>
    </tr>
    <tr>
      <th>Name</th>
      <td><?= $this->data['details']->getFullName(); ?></td>
    </tr>
    <tr>
      <th>Email Address</th>
      <td><?= $this->data['details']->getEmailAddress(); ?></td>
    </tr>
    <tr>
      <th>Tel No.</th>
      <td><?= $this->data['details']->getMobile(); ?></td>
    </tr>
    <tr>
      <th>Home Address</th>
      <td><?= $this->data['details']->getHomeAddress(); ?></td>
    </tr>
    <tr>
      <th>Term Address</th>
      <td><?= $this->data['details']->getTermAddress(); ?></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><?= $this->data['details']->getGender(); ?></td>
    </tr>
    <tr>
      <th class='student-qualifications' colspan='2'>Qualifications</th>
    </tr>
    <?php foreach ($this->data['details']->getQuailifications() as $qualification) : ?>
      <td colspan='2'>
        <?= $qualification->getQuailification(); ?>
      </td>
    <?php endforeach; ?>
    <tr>
      <th class='student-modules' colspan='2'>Modules</th>
    </tr>
    <?php foreach ($this->data['details']->getModules() as $module) : ?>
    <tr>
      <td class='table-cell-link' colspan='2'>
        <a href='<?= BASE_PATH . "{$this->data['details']->getStudentId()}/modules/{$module->getModuleCode()}"; ?>'>
        <?= "{$module->getModuleCode()} {$module->getTitle()}"; ?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>