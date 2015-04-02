
<h3>Attendance Daily</h3>
<table class='att-history'>
  <thead>
    <tr>
      <th class='att-date'>Date</th>
<?php foreach ($this->data['modules'] as $module) : ?>
      <th><?= $module->getModuleCode(); ?></th>
<?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
  <?php foreach($this->data['days'] as $day) : ?>
    <tr>
      <td class='att-date'><?= date('D jS M Y', strtotime($day['Date'])); ?></td>
      <?php foreach($this->data['history'] as $history) : ?>

        <?php if ( $history->hasSession($day['Date']) ) : ?>
          <td class='<?= strtolower($history->getSession($day['Date'])); ?>'><?= "{$history->getSession($day['Date'])}"; ?></td>
        <?php else : ?>
          <td></td>
        <?php endif; ?>

      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

