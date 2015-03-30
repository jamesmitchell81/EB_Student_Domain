<!-- http://php.net/manual/en/control-structures.foreach.php#88578 -->

<?php $timespaces = $this->data['timespaces']; ?>
<?php $timetable = $this->data['timetable']; ?>

<table class='timetable'>
  <thead>
    <tr>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
    </tr>
  </thead>
  <tbody>
    <?php

      // foreach($timespaces as $rowkey => $row) {

        while ( list($key, $value) = each($timespaces) ) {

echo "<tr>";
          foreach($value as $cellkey => $cell) {

            if ( $timetable->hasSession($cellkey, $key) )
            {
              $session = $timetable->getSession($cellkey, $key);
              $durarion = $session->getDuration();
              $rowcount = (($durarion / 60) / 60) * 4;

              $from = strtotime($key);
              $to = ($from + $durarion) - (15 * 60);

              echo "<td rowspan='$rowcount'>{$session->getTitle()}</td>";

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
