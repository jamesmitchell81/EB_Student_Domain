<table>
  <thead>
    <tr>
      <th>Module</th>
      <th>Attended</th>
      <th>Absent</th>
      <th>Authorised</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($this->data['summary'] as $row) : ?>
    <tr>
      <td>
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
      <td>
        <?= "{$row->getTotal()}"; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <?php $totals = $this->data['totals']; ?>
    <tr>
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
      <td>
        <?= "{$totals->getTotal()}"; ?>
      </td>
    </tr>
  </tbody>
</table>