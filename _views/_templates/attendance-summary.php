<h3>Attendance Summary</h3>

<table class='att-summary'>
  <thead>
    <tr>
      <th class='att-title-column'>Module</th>
      <th class='att-data'>Attended</th>
      <th class='att-data'>Absent</th>
      <th class='att-data'>Authorised</th>
      <th class='att-data att-summ-total-column'>Total</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($this->data['summary'] as $row) : ?>
    <tr>
      <td class='att-title-column'>
        <?= "{$row->getModule()->getModulecode()} {$row->getModule()->getTitle()}"; ?>
      </td>
      <td>
        <?= "{$row->getResult('Present')}"; ?>
      </td>
      <td>
        <?= "{$row->getResult('Absent')}"; ?>
      </td>
      <td>
        <?= "{$row->getResult('Authorised')}"; ?>
      </td>
      <td class='att-summ-total-column'>
        <?= "{$row->getTotal()}"; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <?php $totals = $this->data['totals']; ?>
    <tr class='att-summ-total-row'>
      <td>
      </td>
      <td>
        <?= "{$totals->getResult('Present')}"; ?>
      </td>
      <td>
        <?= "{$totals->getResult('Absent')}"; ?>
      </td>
      <td>
        <?= "{$totals->getResult('Authorised')}"; ?>
      </td>
      <td class='att-summ-total-column'>
        <?= "{$totals->getTotal()}"; ?>
      </td>
    </tr>
  </tbody>
</table>