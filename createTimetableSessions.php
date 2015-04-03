<?php

include '_database/DatabaseQuery.php';

$dtStart = new DateTime();
$dtEnd = new DateTime();

$dtStart->setDate(2014, 9, 29);
$dtEnd->setDate(2014, 12, 19);

$db = new DatabaseQuery();

// var_dump($dtStart->diff($dtEnd)); //->days);

//from startDt to endDt.
echo "INSERT INTO Session (Date, idTimetable) VALUES" . "\n";
while ( $dtStart->diff($dtEnd)->days > 0 )
{
  // var_dump($dtStart->diff($dtEnd));

  $weekday = $dtStart->format('D');
  $db->set('weekday', $weekday, PDO::PARAM_STR);
  $db->select('SELECT idTimetable FROM Timetable WHERE Weekday = :weekday');

  $ids = $db->all();

  foreach ($ids as $tt => $id) {
    // var_dump($dtStart->format("Y-m-d"));
    // var_dump($id['idTimetable']);
    // $db->set('id', $id['idTimetable'], PDO::PARAM_INT);
    // $db->set('dt', $dtStart->format("Y-m-d"), PDO::PARAM_STR);
    echo "('" . ($dtStart->format("Y-m-d")) . "', " . $id['idTimetable'] . ")," . "\n";
  }

  $dtStart->modify("+1 day");
}
  // get weekday.
  //SELECT idTimetable FROM Timetable WHERE Weekday = :weekday.


