<!-- http://php.net/manual/en/control-structures.foreach.php#88578 -->

<?php $timespaces = $this->data['timespaces']; ?>
<?php $diary = $this->data['diary']; ?>

<table class='timetable'>
  <thead>
    <tr>
      <th colspan='3' class=''><?= $this->data['today']->format('l jS F Y'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ( list($key, $value) = each($timespaces) ) {

echo "<tr>" . PHP_EOL;

if ( date('i', strtotime($key)) == "0" ) {
  echo " <td class='' rowspan='4'>$key</td>" . PHP_EOL;;
}
          // var_dump($key);

          if ( $diary->hasEvent($this->data['today']->format('Y-m-d'), date('H:i', strtotime($key) )) ) {

            $today = $this->data['today']->format('Y-m-d');
            $time = date('H:i', strtotime($key));
            $events = $diary->getEventsAt($today, $time);

            // var_dump($events);
            // echo "!";

            // foreach ($events as $event) {
              $durarion = $events[0]->getDuration();
              $rowcount = (($durarion / 60) / 60) * 4;

              echo "<td rowspan='$rowcount'>";
              echo " {$events[0]->getTitle()}";
              echo "</td>" . PHP_EOL;

              $from = strtotime($key);
              $to = ($from + $durarion) - (15 * 60);

              while ( $from < $to ) {
                $from += (15 * 60);
                $timestr = date('H:i', $from);
                unset($timespaces[$timestr]);
              }

            // }

          //   {

          //     while ( $from < $to ) {

          //       $from += (15 * 60);
          //       $timestr = date('H:i', $from);
          //       unset($timespaces[$timestr][$cellkey]);
          //     }
            } else {
              echo "<td></td>"  . PHP_EOL;;
            }

          // }

echo "</tr>" . PHP_EOL;;

      }
?>

  </tbody>
</table>
