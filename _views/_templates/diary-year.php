<?php foreach($this->data['months'] as $month) :?>
  <table class="diary-year-month">
    <thead>
      <tr>
        <th colspan="7" class="diary-year-month-label">
          <a href='<?= "{$month['href']}"; ?>' ><?= "{$month['title']}"; ?></a>
        </th>
      </tr>
      <tr>
        <?php foreach ($this->data['days'] as $day) : ?>
          <th class="diary-year-day"><?= $day; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['calender'][$month['title']] as $row => $day) : ?>
      <tr>
        <?php foreach($day as $date) : ?>
        <td>
          <?php if ( $date != '' ) : ?>
            <?php $count = $date['events']->getEventsCount(date('Y-m-d', strtotime($date['date']))); ?>
            <a class='heat-<?= $count ;?>' href='<?= $date['href']; ?>'><?= date('j', strtotime($date['date'])); ?></a>
          <?php endif; ?>
        </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endforeach; ?>
