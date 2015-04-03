


<div class="diary-month">
  <div class='diary-month-cal-header-row'>
<?php foreach( $this->data['days'] as $day) : ?>
    <div class='diary-month-cal-head-cell'>
      <?= $day; ?>
    </div>
<?php endforeach; ?>
  </div>

<?php foreach( $this->data['calender'] as $row) : ?>

  <div class='diary-month-cal-row'>
    <?php foreach($row as $day => $date) {

          if ( $date != '' ) {
            echo "<div class='diary-month-cal-cell'>";

            if ( !empty($date['events']->getEvents() ) ) {
              $count = $date['events']->getEventsCount(date('Y-m-d', strtotime($date['date'])));
              echo "<a class='heat-$count diary-month-cal-cell-link' href='{$date['href']}'>";
              echo date('j', strtotime($date['date'])) . "<span class='dt-suffix'>" . date('S', strtotime($date['date'])) . "</span>";
              echo "<span class='diary-count'>$count</span>";
              echo "</a>";
            } else {
              echo "<a class='heat-0 diary-month-cal-cell-link' href='{$date['href']}'>";
              echo date('j', strtotime($date['date'])) . "<span class='dt-suffix'>" . date('S', strtotime($date['date'])) . "</span>";
              echo "</a>";
            }

            echo "</div>";

          } else {
            echo "<div class='diary-month-cal-cell'></div>";
          }

    } ?>
  </div>

<?php endforeach; ?>

</div><!-- diary - month -->
