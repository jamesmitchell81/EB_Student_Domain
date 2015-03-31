<!-- http://php.net/manual/en/control-structures.foreach.php#88578 -->

<?php $timespaces = $this->data['timespaces']; ?>
<?php $timetable = $this->data['timetable']; ?>

<table class='timetable'>
  <thead>
    <tr>
      <th></th>
      <th class='tt-day'>Mon</th>
      <th class='tt-day'>Tue</th>
      <th class='tt-day'>Wed</th>
      <th class='tt-day'>Thu</th>
      <th class='tt-day'>Fri</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ( list($key, $value) = each($timespaces) ) {

echo "<tr>";

if ( date('i', strtotime($key)) == "0" ) {
  echo " <td class='tt-timespaces' rowspan='4'>$key</td>";
}

          foreach($value as $cellkey => $cell) {

            if ( $timetable->hasSession($cellkey, $key) )
            {
              $session = $timetable->getSession($cellkey, $key);
              $durarion = $session->getDuration();
              $rowcount = (($durarion / 60) / 60) * 4;

              $from = strtotime($key);
              $to = ($from + $durarion) - (15 * 60);

              // echo "<td class='tt-session' rowspan='$rowcount'>";
              echo "<td rowspan='$rowcount'>";
              echo " <span class='tt-session'>";
              echo "  <span class='tt-session-times'>{$session->getStartTime('H:i')} - {$session->getEndTime('H:i')}</span>";
              echo "  <span class='tt-session-room'>";
              echo "  {$session->getRoom()->getRoomReference()}";
              echo "  </span>";
              echo "  <span class='tt-session-title'>";
              echo "  {$session->getTitle()}";
              echo "  </span>";
              echo "  <span class='tt-session-lecturer'>";
              echo "  {$session->getLecturer()->getFullName()}";
              echo "  </span>";
              echo " </span>";
              echo "</td>";

              while ( $from < $to ) {

                $from += (15 * 60);
                $timestr = date('H:i', $from);
                unset($timespaces[$timestr][$cellkey]);
              }

            } else {
              echo "<td></td>";
            }

          }

echo "</tr>";

      }
?>

  </tbody>
</table>
