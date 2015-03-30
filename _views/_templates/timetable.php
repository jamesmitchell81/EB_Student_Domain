<?php $timespaces = $this->data['timespaces']; ?>

<table class='timetable'>
  <thead>
    <tr>
      <th></th>
<?php foreach($this->data['weekdays'] as $weekday) : ?>
      <th><?= $weekday; ?></th>
<?php endforeach; ?>
  <tbody>

    <?php foreach($timespaces as $timespace) : ?>
    <tr>
      <?php if ( date('i', strtotime($timespace)) == "00" ) : ?>
      <td rowspan='4'><?= $timespace; ?></td>
      <?php endif; ?>

      <td><?= $timespace; ?></td>
      <td><?= $timespace; ?></td>
      <td><?= $timespace; ?></td>
      <td><?= $timespace; ?></td>
      <td><?= $timespace; ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




<!-- <table class='timetable'>
  <thead>
    <tr>
      <th></th>
<?php foreach($this->data['weekdays'] as $weekday) : ?>
      <th><?= $weekday; ?></th>
<?php endforeach; ?>
  <tbody>

  <?php for( $i = 0; $i < count($timespaces['Mon']) - 1; $i++ ) : ?>
  <tr>
    <?php if ( $i % 4 == 0 ) : ?>
    <td rowspan='4'><?= $timespaces['Mon'][$i]; ?></td>
    <?php endif; ?>
    <?php foreach ($timespaces as $timespace) : ?>
        <td><?= $timespace[$i]; ?></td>
    <?php endforeach; ?>
  </tr>
  <?php endfor; ?>
  </tbody>
</table>
 -->

<!--       <table class='timetable'>
        <thead>
          <tr>
            <th></th>
            <th class='tt-day-column'>Mon</th>
            <th class='tt-day-column'>Tue</th>
            <th class='tt-day-column'>Wed</th>
            <th class='tt-day-column'>Thu</th>
            <th class='tt-day-column'>Fri</th>
          </tr>
        </thead>
        <tbody>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>08:00</td>
            <td data-day="mon" data-time="08:00"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>09:00</td>
            <td data-day="mon" data-time="09:00"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>10:00</td>
            <td data-day="mon" data-time="10:00"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>11:00</td>
            <td data-day="mon" data-time="11:00"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>12:00</td>
            <td data-day="mon" data-time="12:00"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>13:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>14:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>15:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>16:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>17:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr class='tt-time-row'>
            <td class='tt-time-column'>18:00</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>

 -->