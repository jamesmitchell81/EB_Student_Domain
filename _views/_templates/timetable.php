<?php include "head.php"; ?>

<?php include "logo-column.php"; ?>
<div class="col-2">
  <?php include "header-nav.php"; ?>
  <article id="content">

    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Timetable</span></h2>
    </div>

    <div class="wrap" id="content-workspace">

      <span class="tt-session" data-day="mon" data-start="10:00" data-finish="11:30">
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
      </table>

    </div><!-- #content-workspace .wrap -->
  </article>
</div><!-- .col2 -->

<?php include "footer.php"; ?>