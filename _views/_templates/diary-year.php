<?php include "head.php"; ?>
<?php include "logo-column.php"; ?>
<div class="col-2">
<?php include "header-nav.php"; ?>
  <article id="content">
    <div class="wrap" id="content-header">

      <h2><span class='page-action'>View</span><span class='page-entity'><?= "{$this->data['entity']}" ?></span></h2>
    </div>

    <div class="wrap" id="content-workspace">

      <?php
        $dt = $this->data['start'];
        $weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

        $week = 0;
        $m = $dt->format('F');

        while ( $dt->format('Y') == '2015')
        {
          $week = 0;
          $month = [];
          $month[$week] = [];
          while ( $dt->format('F') == $m )
          {
            $weekday = $dt->format('D');
            $month[$week][$weekday] = newDay($dt);
            if ( $dt->format('D') == 'Sun' ) $week++;
            $dt->modify('+1 day');
          }
          $year[$m] = $month;
          $m = $dt->format('F');
        }

        function newDay($dt)
        {
          return [
            'date'    => $dt->format('d'),
            'weekday' => $dt->format('D'),
            'href'    => $dt->format('Y/m/d')
          ];
        }

      ?>

  <?php foreach ($year as $monthName => $monthWeeks) : ?>
  <table class="diary-year-month">
    <col class="diary-year-mon" />
    <col class="diary-year-tue" />
    <col class="diary-year-wed" />
    <col class="diary-year-thu" />
    <col class="diary-year-fri" />
    <col class="diary-year-sat" />
    <col class="diary-year-sun" />
    <thead>
      <tr>
        <th colspan="7" class="diary-year-month-label"><?= "$monthName"; ?></th>
      </tr>
      <tr>
        <?php foreach ($weekdays as $day) : ?>
          <th class="diary-year-day"><?= $day; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
    <?php for ( $week = 0; $week < count($monthWeeks); $week++ ) : ?>
      <tr>
<!--         <?= "$monthName"; ?>
        <?php var_dump($monthWeeks[$week]); ?>
 -->      <?php foreach ($weekdays as $day) : ?>
      <?php if ( array_key_exists($day, $monthWeeks[$week]) ) : ?>
        <td><a href='<?= "{$monthWeeks[$week][$day]['href']}"; ?>'><?= "{$monthWeeks[$week][$day]['date']}"; ?></a></td>
      <?php else : ?>
        <td></td>
      <?php endif; ?>
      <?php endforeach; ?>
      </tr>
     <?php endfor; ?>
    </tbody>
  </table>
<?php endforeach; ?>

  </div><!-- end wrap -->
</article>

</div>