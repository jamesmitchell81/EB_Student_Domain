<?php

require "_classes/TimetableSession.php";
require "_classes/TimetableTable.php";

function basetime($hour)
{
  if ( $hour < 1 ) return (($hour) * 60) * 60;
  return (($hour - 1) * 60) * 60;
}

function basewd($n) {
  return (((($n + 3) * 60) * 60) * 24);
}

$table = new TimetableTable("08:00", "18:00");
$table->addSession(new TimetableSession("MR57", "James", "C1002", basetime(12), basetime(12) + basetime(1), "Mon"));
$table->addSession(new TimetableSession("NWO18", "James", "C1003", basetime(11.5), basetime(11.5) + basetime(1.5), "Wed"));
$table->addSession(new TimetableSession("MY96", "James", "C1004", basetime(14.25), basetime(14.25) + basetime(2), "Fri"));

// $table->draw();
$days = ["Mon", "Tue", "Wed", "Thu", "Fri"];
$hours = [];
$start = basetime(8);

for ( $i = 0; $i < (12 * 4); $i++ )
{
  $hours[] = $start + basetime($i * 0.25);
}

$structure = [
  "Mon" => $hours,
  "Tue" => $hours,
  "Wed" => $hours,
  "Thu" => $hours,
  "Fri" => $hours
];

// echo date("d D M Y , w", basewd(5));


?>

<?php include "_includes/head.php"; ?>

<?php include "_includes/column_one.php"; ?>
<div class="col-2">
  <?php include "_includes/header_2.php"; ?>
  <article id="content">

    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Timetable</span></h2>
    </div>

    <div class="wrap" id="content-workspace">

      <table class='timetable'>
        <thead>
          <tr>
            <th></th>
            <?php
              foreach ($structure as $day => $ho)
              {
                echo "<th class='tt-day-column'>{$day}</th>";
              }
            ?>
          </tr>
        </thead>
        <tbody>
            <?php

            ?>
        </tbody>
      </table>


<!--  <span class="tt-session" data-day="mon" data-start="10:00" data-finish="11:30">
        <span class="tt-session-item"><span>Start:</span> 10:00</span>
        <span class="tt-session-item"><span>Module:</span> CSY2028</span>
        <span class="tt-session-item"><span>Room:</span> MB8</span>
        <span class="tt-session-item"><span>Finish:</span> 11:30</span>
      </span>

      <table class='timetable'>
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
      </table> -->

    </div><!-- #content-workspace .wrap -->
  </article>
</div><!-- .col2 -->

<?php include "_includes/footer.php"; ?>