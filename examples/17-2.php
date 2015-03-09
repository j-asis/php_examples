<?php 
$tz = ini_get('date.timezone');
$dtz = new DateTimeZone($tz);

$past = new DateTime("2009-02-12 16:42:33", $dtz);
$current = new DateTime("now", $dtz);
// creates a new instance of DateInterval
$diff = $past->diff($current);
$pastString = $past->format("Y-m-d");
$currentString = $current->format("Y-m-d");
$diffString = $diff->format("%yy %mm, %dd");
echo "Difference between {$pastString} and {$currentString} is {$diffString}";

 ?>